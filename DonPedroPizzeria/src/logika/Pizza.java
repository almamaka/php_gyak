package logika;

public class Pizza {

	private String azonosito;
	private String nev;
	private int egysegAr;
	private int eladottDb;
	private int akcios;
	
	public String getAzonosito() {
		return azonosito;
	}
	
	public String getNev() {
		return nev;
	}
	
	public int getEgysegAr() {
		return egysegAr;
	}
	
	public int getEladottDb() {
		return eladottDb;
	}
	
	public int getAkcios() {
		return akcios;
	}
	
	public Pizza(String azonosito, String nev, int egysegAr, int eladottDb, int akcios) {
		super();
		this.azonosito = azonosito;
		this.nev = nev;
		this.egysegAr = egysegAr;
		this.eladottDb = eladottDb;
		this.akcios = akcios;
	}
	
	public String getAkciosSzovegesen() {
		String akciosSzoveg = "";
		switch (akcios) {
			case 1:
				akciosSzoveg = "igen";
				break;
			case 0:
				akciosSzoveg = "nem";
				break;
		}	
		return akciosSzoveg;
		
	}

	@Override
	public String toString() {
		return "Pizza [azonosito=" + azonosito + ", nev=" + nev + ", egysegAr=" + egysegAr + ", eladottDb=" + eladottDb
				+ ", akcios=" + akcios + "]";
	}
	
	
	
}
