package logika;

public class Etel {
	
	private String azonosito;
	private String nev;
	private int kategoriaId;
	private int egysegAr;
	private int eladottMennyiseg;
	
	
	public Etel(String azonosito, String nev, int kategoriaId, int egysegAr, int eladottMennyiseg) {
		super();
		this.azonosito = azonosito;
		this.nev = nev;
		this.kategoriaId = kategoriaId;
		this.egysegAr = egysegAr;
		this.eladottMennyiseg = eladottMennyiseg;
	}

	/*public Etel(String sor) {
		String [] tomb = sor.split(",");
        this.azonosito = tomb[0];
        this.nev = tomb[1];
        this.kategoriaId = Integer.parseInt(tomb[2]);
        this.egysegAr = Integer.parseInt(tomb[3]);
        this.eladottMennyiseg = Integer.parseInt(tomb[4]);
	}*/
	
	public String getKategoriaSzoveg() {
		String kategoriaSzoveg = "";
		switch (kategoriaId) {
			case 1:
				kategoriaSzoveg = "leves";
				break;
			case 2:
				kategoriaSzoveg = "fõétel";
				break;
			case 3:
				kategoriaSzoveg = "desszert";
				break;				
		}
		return kategoriaSzoveg;
		
	}

	public String getAzonosito() {
		return azonosito;
	}
	
	public String getNev() {
		return nev;
	}

	public int getKategoriaId() {
		return kategoriaId;
	}
	
	public int getEgysegAr() {
		return egysegAr;
	}
	
	public int getEladottMennyiseg() {
		return eladottMennyiseg;
	}

	@Override
	public String toString() {
		return "Etel [azonosito=" + azonosito + ", nev=" + nev + ", kategoriaId=" + kategoriaId + ", egysegAr="
				+ egysegAr + ", eladottMennyiseg=" + eladottMennyiseg + "]";
	}	
	
	

}
