package logika;

import java.util.ArrayList;

public class Muveletek {
	
	FajlKezelo f = new FajlKezelo();

	public String legolcsobbPizza() {
		ArrayList<Pizza> ujPizzak = f.hibasAdatTorlese();
		int min = ujPizzak.get(0).getEgysegAr();
		String legolcsobbPizza = "Legolcsóbb pizza azonositó: " + ujPizzak.get(0).getAzonosito() + ", név: " + ujPizzak.get(0).getNev() + ", ár: " + min + " Ft";;
		for (int i = 0; i < ujPizzak.size(); i++) {
			if (ujPizzak.get(i).getEgysegAr() < min) {
				min = ujPizzak.get(i).getEgysegAr();
				legolcsobbPizza = "Legolcsóbb pizza azonositó: " + ujPizzak.get(i).getAzonosito() + ", név: " + ujPizzak.get(i).getNev() + ", ár: " + min + " Ft";
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
		szoveg = "A pizzák ennyi százaléka akciós: " + String.format("%.2f", akcioszazalek) + "%";
		
		return szoveg;
	}
}
