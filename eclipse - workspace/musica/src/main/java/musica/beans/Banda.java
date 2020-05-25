package musica.beans;


public class Banda {
	
	private Integer cod;
	private String nome;
	private Integer integrantes;
	
	public Banda() {
		
	}
	
	public Banda( Integer cod, String nome, Integer integrantes) {
		this.cod = cod;
		this.nome = nome;
		this.integrantes = integrantes;
		
	}
	
	public String toString() {
		return "Banda{ codigo:" + cod + ", nome:" + nome + ", integrantes:" + integrantes + " }" ;
	}
	
	
	
	public Integer getCod() {
		return cod;
	}
	public void setCod(Integer cod) {
		this.cod = cod;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}

	public Integer getIntegrantes() {
		return integrantes;
	}

	public void setIntegrantes(Integer integrantes) {
		this.integrantes = integrantes;
	}


}
