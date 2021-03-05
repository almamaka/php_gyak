package grafika;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JButton;

import java.util.ArrayList;

import javax.swing.JTable;
import javax.swing.table.DefaultTableModel;

import logika.Etel;
import logika.FajlKezelo;
import logika.Muveletek;

import javax.swing.JScrollPane;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

import javax.swing.JLabel;
import javax.swing.JOptionPane;

public class NadfedelesEtterem extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 2327968633193835504L;
	private static NadfedelesEtterem frame;
	private JPanel contentPane;
	private JTable table;
	private JScrollPane scrollPane;
	private JButton btnBeolvasas;
	private JButton btnHibasAdat;
	private JButton btnLegolcsobbLeves;
	private JButton btnHetiOsszbevetel;
	private JButton btnFoetelekKulonFajlba;
	private JButton btnEtelekSzazalekosan;
	private JButton btnKilep;
	private JLabel lblNewLabel;
	FajlKezelo f;
	Muveletek m;
	
	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					frame = new NadfedelesEtterem();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public NadfedelesEtterem() {
		m = new Muveletek();
		f = new FajlKezelo();
		
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 570, 430);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		btnBeolvasas = new JButton("F\u00E1jl beolvas");
		btnBeolvasas.setBounds(402, 228, 129, 23);
		btnBeolvasas.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				ArrayList<Etel> etelek = f.fajlBeolvas("nadfedeles.csv");
				String col[] = {"azon", "nev", "kategID", "ar", "mennyiseg"};
				DefaultTableModel tableModel = new DefaultTableModel(col, 0);
				
				table = new JTable(tableModel);
				scrollPane.setViewportView(table);
				
				contentPane.setLayout(null);
				for(int i = 0; i < etelek.size(); i++) {
					
					Etel etel = etelek.get(i);
					Object [] tableRow = {etel.getAzonosito(), etel.getNev(), etel.getKategoriaSzoveg(), etel.getEgysegAr(), etel.getEladottMennyiseg()};
					tableModel.addRow(tableRow);
				}
				btnHibasAdat.setEnabled(true);
				btnBeolvasas.setEnabled(false);
			}
		});
		contentPane.add(btnBeolvasas);
		
		btnHibasAdat = new JButton("Hib\u00E1s adat t\u00F6rl\u00E9se");
		btnHibasAdat.setBounds(402, 262, 129, 23);
		btnHibasAdat.setEnabled(false);
		contentPane.add(btnHibasAdat);
		btnHibasAdat.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				ArrayList<Etel> ujEtelek = f.hibasAdatTorlese();
				String col[] = {"azon", "nev", "kategID", "ar", "mennyiseg"};
				DefaultTableModel tableModel = new DefaultTableModel(col, 0);
				
				table = new JTable(tableModel);
				scrollPane.setViewportView(table);
				
				for(int i = 0; i < ujEtelek.size(); i++) {
					
					Etel etel = ujEtelek.get(i);
					Object [] tableRow = {etel.getAzonosito(), etel.getNev(), etel.getKategoriaSzoveg(), etel.getEgysegAr(), etel.getEladottMennyiseg()};
					tableModel.addRow(tableRow);
				}
				btnHibasAdat.setEnabled(false);
				btnBeolvasas.setEnabled(false);
				
				btnLegolcsobbLeves.setEnabled(true);
				btnHetiOsszbevetel.setEnabled(true);
				btnEtelekSzazalekosan.setEnabled(true);
				btnFoetelekKulonFajlba.setEnabled(true);
			}
		});
		
		
		btnLegolcsobbLeves = new JButton("Legolcs\u00F3bb leves");
		btnLegolcsobbLeves.setBounds(24, 228, 189, 23);
		btnLegolcsobbLeves.setEnabled(false);
		contentPane.add(btnLegolcsobbLeves);
		btnLegolcsobbLeves.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JOptionPane.showMessageDialog(contentPane, m.legolcsobbLeves());
			}
		});
		
		scrollPane = new JScrollPane();
		scrollPane.setBounds(24, 11, 507, 179);
		contentPane.add(scrollPane);
		
		btnHetiOsszbevetel = new JButton("Heti \u00F6sszbev\u00E9tel");
		btnHetiOsszbevetel.setBounds(24, 257, 189, 23);
		btnHetiOsszbevetel.setEnabled(false);
		contentPane.add(btnHetiOsszbevetel);
		btnHetiOsszbevetel.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				
				lblNewLabel.setText(m.hetiOsszbevetel());
			}
		});
		
		lblNewLabel = new JLabel();
		lblNewLabel.setBounds(223, 257, 129, 23);
		
		contentPane.add(lblNewLabel);

		
		btnFoetelekKulonFajlba = new JButton("F\u0151\u00E9telek k\u00FCl\u00F6n f\u00E1jlba ir");
		btnFoetelekKulonFajlba.setBounds(24, 291, 189, 23);
		btnFoetelekKulonFajlba.setEnabled(false);
		contentPane.add(btnFoetelekKulonFajlba);
		btnFoetelekKulonFajlba.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				boolean sikeresFajlbamasolas = f.fajlbaIrFoetelek();
				if(sikeresFajlbamasolas == true) {
					JOptionPane.showMessageDialog(contentPane, "Sikeres fájlba irás");
				}
			}
		});
		
		btnEtelekSzazalekosan = new JButton("\u00C9telek sz\u00E1zal\u00E9kosan");
		btnEtelekSzazalekosan.setBounds(24, 325, 189, 23);
		btnEtelekSzazalekosan.setEnabled(false);
		contentPane.add(btnEtelekSzazalekosan);
		btnEtelekSzazalekosan.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JOptionPane.showMessageDialog(contentPane, m.hanySzazalek());
			}
		});
		
		btnKilep = new JButton("KIL\u00C9P");
		btnKilep.setBounds(454, 357, 90, 23);
		contentPane.add(btnKilep);
		btnKilep.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				frame.dispose();
			}
		});

		
		
	}
}
