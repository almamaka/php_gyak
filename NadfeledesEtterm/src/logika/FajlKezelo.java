package logika;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.util.ArrayList;

public class FajlKezelo {

	private ArrayList<Etel> etelek;
	private ArrayList<Etel> ujEtelek;
	private String [] elsosor;
	
	
	
	public ArrayList<Etel> getEtelek() {
		return etelek;
	}
	
	
	public ArrayList<Etel> getUjEtelek() {
		return ujEtelek;
	}


	public void setUjEtelek(ArrayList<Etel> ujEtelek) {
		this.ujEtelek = ujEtelek;
	}


	public String [] getElsosor() {
		return elsosor;
	}


	public ArrayList<Etel> fajlBeolvas(String fajlNev) {
		etelek= new ArrayList<>();
		elsosor = new String [5];
        try {
        	
            InputStreamReader fr = new InputStreamReader(new FileInputStream(fajlNev), "UTF8");
            BufferedReader br = new BufferedReader(fr);
            elsosor = br.readLine().split(";");
            String sor = br.readLine();
            while (sor!=null) {
            	String [] tomb = sor.split(";");
                String azonosito = tomb[0];
                String nev = tomb[1];
                int kategoriaId = Integer.parseInt(tomb[2]);
                int egysegAr = Integer.parseInt(tomb[3]);
                int eladottMennyiseg = Integer.parseInt(tomb[4]);
                etelek.add(new Etel(azonosito, nev, kategoriaId, egysegAr, eladottMennyiseg));
                sor = br.readLine();
            }
            br.close();
            //System.out.println(etelek);
        }
        catch (Exception e){
            System.out.println("Hiba: " +e);
        }

		return etelek;
	}
	
	public ArrayList<Etel> hibasAdatTorlese() {
		ujEtelek = new ArrayList<>();
		etelek = fajlBeolvas("nadfedeles.csv");
		for(int i = 0; i < etelek.size(); i++) {
			if (etelek.get(i).getAzonosito().length() != 10) {
				//System.out.println(etelek.get(i));
				etelek.remove(etelek.get(i));
				ujEtelek = etelek;
				//System.out.println(ujEtelek);
			}
		}
		return ujEtelek;
	}	
	
	public boolean fajlbaIrFoetelek() {
		ujEtelek = new ArrayList<>();
		try {
			BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(new FileOutputStream("foetelek.csv"), "UTF8"));
			for(int i = 0; i < etelek.size(); i++) {
				if (etelek.get(i).getKategoriaId() == 2) {
					bw.write(etelek.get(i).getAzonosito() + ";" + etelek.get(i).getNev() + ";" + etelek.get(i).getKategoriaId() + ";" + etelek.get(i).getEgysegAr() + ";" + etelek.get(i).getEladottMennyiseg());
					bw.write("\n");
				}
			}
			bw.close();
			return true;
		}
		catch (Exception e){
			System.out.println("HIBA: " + e);
			return false;
		}
	}

	
	
}
