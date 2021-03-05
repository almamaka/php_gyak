import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.ArrayList;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.table.DefaultTableCellRenderer;
import javax.swing.table.DefaultTableModel;

import logika.FajlKezelo;
import logika.Muveletek;
import logika.Pizza;

import javax.swing.JButton;
import java.awt.Color;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.SwingConstants;

public class Pizzeria extends JFrame {

	private static final long serialVersionUID = -6136947340902684744L;
	private static Pizzeria frame;
	private JPanel contentPane;
	private JButton btnLegolcsobbPizza;
	private JButton btnKetezerAlatt;
	private JButton btnAkciosakSzazalek;
	private JButton btnAkciosFajlbair;
	private JButton btnFajlBeolvasas;
	private JButton btnHibasAdatTorlese;
	private JButton btnKilep;
	private JPanel panel;
	FajlKezelo f;
	Muveletek m;
	private JScrollPane scrollPane;
	private JTable table;
	private JLabel lblKetezerAlattl;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					frame = new Pizzeria();
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
	public Pizzeria() {
		
		initComponents();
		createEvents();
		f = new FajlKezelo();
		m = new Muveletek();

	}

	

	private void initComponents() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 679, 429);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		panel = new JPanel();
		panel.setBounds(23, 209, 620, 170);
		contentPane.add(panel);
		panel.setLayout(null);
		
		btnLegolcsobbPizza = new JButton("Legolcsobb pizza");
		btnLegolcsobbPizza.setEnabled(false);
		btnLegolcsobbPizza.setBounds(0, 0, 200, 25);
		panel.add(btnLegolcsobbPizza);
		
		btnKetezerAlatt = new JButton("2000 Ft alatti db");
		btnKetezerAlatt.setEnabled(false);
		btnKetezerAlatt.setBounds(0, 40, 200, 25);
		panel.add(btnKetezerAlatt);
		
		btnAkciosakSzazalek = new JButton("Akci\u00F3sak sz\u00E1zal\u00E9k");
		btnAkciosakSzazalek.setEnabled(false);
		btnAkciosakSzazalek.setBounds(0, 80, 200, 25);
		panel.add(btnAkciosakSzazalek);
		
		btnAkciosFajlbair = new JButton("Akcios fajlbair");
		btnAkciosFajlbair.setEnabled(false);
		btnAkciosFajlbair.setBounds(0, 120, 200, 25);
		panel.add(btnAkciosFajlbair);
		
		btnFajlBeolvasas = new JButton("Fajl Beolvasas");
		btnFajlBeolvasas.setBackground(Color.LIGHT_GRAY);
		btnFajlBeolvasas.setBounds(420, 0, 200, 25);
		panel.add(btnFajlBeolvasas);
		
		btnHibasAdatTorlese = new JButton("Hibas adat torlese");
		btnHibasAdatTorlese.setEnabled(false);
		btnHibasAdatTorlese.setBounds(420, 40, 200, 25);
		panel.add(btnHibasAdatTorlese);
		
		btnKilep = new JButton("Kilep");
		btnKilep.setBackground(Color.RED);
		btnKilep.setBounds(522, 144, 98, 26);
		panel.add(btnKilep);
		
		scrollPane = new JScrollPane();
		scrollPane.setBounds(23, 12, 620, 184);
		contentPane.add(scrollPane);
		
		lblKetezerAlattl = new JLabel("", SwingConstants.CENTER);
		lblKetezerAlattl.setBounds(210, 40, 200, 25);
		
	}
	
	private void createEvents() {
		btnKilep.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				frame.dispose();
			}
		});
		
		btnFajlBeolvasas.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				ArrayList<Pizza> pizzak = f.fajlBeolvas("pizzeria.csv");
				String [] fejlec = f.getFejlec();
				DefaultTableModel tableModel = new DefaultTableModel(fejlec, 0);
				table = new JTable(tableModel);
				scrollPane.setViewportView(table);
				
				for (int i = 0; i < pizzak.size(); i++) {
					Pizza pizza = pizzak.get(i);
					Object [] tableRow = {pizza.getAzonosito(), pizza.getNev(), pizza.getEgysegAr(), pizza.getEladottDb(), pizza.getAkciosSzovegesen()};
					tableModel.addRow(tableRow);
				}
				DefaultTableCellRenderer centerRenderer = new DefaultTableCellRenderer();
				centerRenderer.setHorizontalAlignment(SwingConstants.CENTER);
				for (int i = 0; i < fejlec.length; i++ ){
			         table.getColumnModel().getColumn(i).setCellRenderer(centerRenderer);
			    }
				btnFajlBeolvasas.setEnabled(false);
				btnHibasAdatTorlese.setEnabled(true);
				
				
				
			}
		});
		
		btnHibasAdatTorlese.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				ArrayList<Pizza> pizzak = f.hibasAdatTorlese();
				String [] fejlec = f.getFejlec();
				DefaultTableModel tableModel = new DefaultTableModel(fejlec, 0);
				table = new JTable(tableModel);
				scrollPane.setViewportView(table);
				
				
				for (int i = 0; i < pizzak.size(); i++) {
					Pizza pizza = pizzak.get(i);
					Object [] tableRow = {pizza.getAzonosito(), pizza.getNev(), pizza.getEgysegAr(), pizza.getEladottDb(), pizza.getAkciosSzovegesen()};
					tableModel.addRow(tableRow);
				}
				DefaultTableCellRenderer centerRenderer = new DefaultTableCellRenderer();
				centerRenderer.setHorizontalAlignment(SwingConstants.CENTER);
				for (int i = 0; i < fejlec.length; i++) {
			         table.getColumnModel().getColumn(i).setCellRenderer( centerRenderer );
			    }
				btnAkciosakSzazalek.setEnabled(true);
				btnLegolcsobbPizza.setEnabled(true);
				btnKetezerAlatt.setEnabled(true);
				btnAkciosFajlbair.setEnabled(true);
				
				btnHibasAdatTorlese.setEnabled(false);
			}
		});
		
		btnLegolcsobbPizza.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JOptionPane.showMessageDialog(contentPane, m.legolcsobbPizza());
			}
		});
		
		btnKetezerAlatt.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				panel.add(lblKetezerAlattl);
				lblKetezerAlattl.setText(m.ketezerAlatt());
				lblKetezerAlattl.setBackground(Color.gray);
				lblKetezerAlattl.setOpaque(true);				
			}
		});
		
		btnAkciosakSzazalek.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JOptionPane.showMessageDialog(contentPane, m.hanySzazalekAkcios());
			}
		});
		
		btnAkciosFajlbair.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				if (f.fajlbaIras() == true) {
					JOptionPane.showMessageDialog(contentPane, "Sikeres fájlba irás");
				}
				
			}
		});
		
	}	
}
