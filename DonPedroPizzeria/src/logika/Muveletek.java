package logika;

import java.util.ArrayList;

public class Muveletek {
	
	FajlKezelo f = new FajlKezelo();

	public String legolcsobbPizza() {
		ArrayList<Pizza> ujPizzak = f.hibasAdatTorlese();
		int min = ujPizzak.get(0).getEgysegAr();
		String legolcsobbPizza = "Legolcs�bb pizza azonosit�: " + ujPizzak.get(0).getAzonosito() + ", n�v: " + ujPizzak.get(0).getNev() + ", �r: " + min + " Ft";;
		for (int i = 0; i < ujPizzak.size(); i++) {
			if (ujPizzak.get(i).getEgysegAr() < min) {
				min = ujPizzak.get(i).getEgysegAr();
				legolcsobbPizza = "Legolcs�bb pizza azonosit�: " + ujPizzak.get(i).getAzonosito() + ", n�v: " + ujPizzak.get(i).getNev() + ", �r: " + min + " Ft";
			}			
		}
		return legolcsobbPizza;
	}

	public String ketezerAlatt() {
		ArrayList<Pizza> ujPizzak = f.hibasAdatTorlese();
		int db = 0;
		String ketezerAlatt = "";
		for (int i = 0; i < ujPizzak.size(); i++) {
			if (ujPizzak.get(i).getEgysegAr() < 2000) {
				db++;
				ketezerAlatt = db + " db";
			}			
		}
		return ketezerAlatt;
	}
	
	public String hanySzazalekAkcios() {
		ArrayList<Pizza> ujPizzak = f.hibasAdatTorlese();
		String szoveg = "";
		float osszes = ujPizzak.size();
		float akciosakSzama = 0;
		for (int i = 0; i < ujPizzak.size(); i++) {
			if (ujPizzak.get(i).getAkcios() == 1) {
				akciosakSzama++;
				
			}			
		}
		float akcioszazalek = akciosakSzama / osszes * 100;
		szoveg = "A pizz�k ennyi sz�zal�ka akci�s: " + String.format("%.2f", akcioszazalek) + "%";
		
		return szoveg;
	}
}
