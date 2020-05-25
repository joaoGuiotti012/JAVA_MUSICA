package musica.beans;

import java.util.Date;
import java.sql.Time;
import java.sql.Timestamp;
import java.time.LocalDate;

import musica.beans.Show;
import musica.beans.Banda;

public class ShowBanda {

	
	private Integer cod;
	private String local;
	private Date data;
	private Integer lotacao;
	private Show show;
	private Banda banda;
	
	public ShowBanda( ) {
	
	}
	
	public ShowBanda( Integer cod, String local, Date data, Integer lotacao, Show show, Banda banda ) {
		this.cod = cod;
		this.local = local;
		this.data = data;
		this.lotacao = lotacao;
		this.show = show;
		this.banda = banda;
	}
 

	public String toString() {
		return "Show_Banda{ codigo:" + cod + ", local:" + local + ", DATA:" + data + ", lotacao:" + lotacao + "Show: "+ show + "Banda: " + banda + " }" ;
	}

	public Integer getLotacao() {
		return lotacao;
	}

	public void setLotacao(Integer lotacao) {
		this.lotacao = lotacao;
	}

	public Integer getCod() {
		return cod;
	}

	public void setCod(Integer cod) {
		this.cod = cod;
	}

	public String getLocal() {
		return local;
	}

	public void setLocal(String local) {
		this.local = local;
	}

	public Date getData() {
		return data;
	}

	public void setData(Date dataHr) {
		this.data = dataHr;
	}

	public Show getShow() {
		return show;
	}

	public void setShow(Show show) {
		this.show = show;
	}

	public Banda getBanda() {
		return banda;
	}

	public void setBanda(Banda banda) {
		this.banda = banda;
	}
	
	
}
