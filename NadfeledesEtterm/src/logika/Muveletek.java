package logika;

import java.util.ArrayList;

public class Muveletek {
	
	FajlKezelo f = new FajlKezelo();
	private String bevetel;
	
	public String getBevetel() {
		return bevetel;
	}

	public void setBevetel(String bevetel) {
		this.bevetel = bevetel;
	}
	
	public String hetiOsszbevetel() {
		int osszeg = 0;
		ArrayList<Etel> ujEtelek = f.hibasAdatTorlese();
		System.out.println(f.hibasAdatTorlese());
		for (int i = 0; i < ujEtelek.size(); i++) {

			osszeg += ujEtelek.get(i).getEgysegAr();
			bevetel = String.format("%d", osszeg);
		}
			
		return bevetel;
	}
	
	public String legolcsobbLeves() {
		ArrayList<Etel> ujEtelek = f.hibasAdatTorlese();
		int min = 0;
		String legolcsobbLeves = "";
		for (int i = 0; i < ujEtelek.size(); i++) {
			min = ujEtelek.get(0).getEgysegAr();
			if (ujEtelek.get(i).getKategoriaId() == 1) {
				if (ujEtelek.get(i).getEgysegAr() < min) {
					min = ujEtelek.get(i).getEgysegAr();
					legolcsobbLeves = "A legolcsóbb leves neve: " + ujEtelek.get(i).getNev() + " , egységára: " + min + " Ft";
				}
			}
		}
		return legolcsobbLeves;
	}
	
	public String hanySzazalek() {
		ArrayList<Etel> ujEtelek = f.hibasAdatTorlese();
	
		String szazalekosEredmeny = "";
		int osszes = ujEtelek.size();
		float leves = 0;
		float foetel = 0;
		float desszert = 0;
		for (int i = 0; i < ujEtelek.size(); i++) {
			if (ujEtelek.get(i).getKategoriaId() == 1) {
				leves++;
			}
			else if (ujEtelek.get(i).getKategoriaId() == 2) {
				foetel++;
			}
			else {
				desszert++;
			}
		}
		leves = leves / osszes * 100;
		foetel = foetel / osszes * 100;
		desszert = desszert / osszes * 100;
		szazalekosEredmeny = "Leves: " + String.format("%.2f", leves) + "%. Fõétel: " +String.format("%.2f", foetel) + "%. Desszert: " + String.format("%.2f", desszert) + "%.";  
		return szazalekosEredmeny;
	}
	
	
}
