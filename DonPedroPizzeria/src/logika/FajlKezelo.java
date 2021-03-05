package logika;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.util.ArrayList;

public class FajlKezelo {
	
	ArrayList<Pizza> pizzak;
	ArrayList<Pizza> ujPizzak;
	String[] fejlec;

	public String[] getFejlec() {
		return fejlec;
	}
	
	public ArrayList<Pizza> getPizzak() {
		return pizzak;
	}
	
	public ArrayList<Pizza> getUjPizzak() {
		return ujPizzak;
	}

	public ArrayList<Pizza> fajlBeolvas(String fajlNev) {
		pizzak = new ArrayList<>();
		fejlec = new String[5];
		try {
			InputStreamReader reader = new InputStreamReader(new FileInputStream(fajlNev), "UTF8");
			BufferedReader br = new BufferedReader(reader);
			
			fejlec = br.readLine().split(";");
			String sor = br.readLine();
			while (sor != null) {
				String [] adatok = sor.split(";");
				String azonosito = adatok[0];
				String nev = adatok[1];
				int egysegAr = Integer.parseInt(adatok[2]);
				int eladottDb = Integer.parseInt(adatok[3]);
				int akcios = Integer.parseInt(adatok[4]);
				pizzak.add(new Pizza(azonosito, nev, egysegAr, eladottDb, akcios));
				sor = br.readLine();
			}
			br.close();
			reader.close();
			
		} 
		catch (Exception e) {
			System.out.println("Hiba: " + e);
		}
		
		return pizzak;
	}
	
	public ArrayList<Pizza> hibasAdatTorlese() {
		ujPizzak = new ArrayList<>();
		
		pizzak = fajlBeolvas("pizzeria.csv");
		for (int i = 0; i < pizzak.size(); i++) {
			if (pizzak.get(i).getAzonosito().length() != 9) {
				pizzak.remove(pizzak.get(i));
				ujPizzak = pizzak;
				System.out.println(ujPizzak);
				
			}
		}
		return ujPizzak;
	} 
	
	public boolean fajlbaIras() {
		System.out.println(ujPizzak);
		try {
			BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(new FileOutputStream("akcios.csv"), "UTF8"));
			for (int i = 0; i < ujPizzak.size(); i++) {
				if (ujPizzak.get(i).getAkcios() == 1) {
					bw.write(ujPizzak.get(i).getAzonosito() + ";" + ujPizzak.get(i).getNev() + ";" + ujPizzak.get(i).getEgysegAr() + ";" + ujPizzak.get(i).getEladottDb() + ";" + ujPizzak.get(i).getAkcios());
					bw.write("\n");
				}
			}
			bw.close();
			return true;
		}
		catch (Exception e) {
			System.out.println("Hiba: " + e);
			return false;
		}
		
	
	}
}
