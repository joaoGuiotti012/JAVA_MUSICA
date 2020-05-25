package musica.beans;

public class Musica {
	
	private Integer cod ;
	
	private String nome;
	
	private Banda banda;
	
	private Integer duracao;
	
	public Musica() {
		
	}
	public Musica( Integer cod, String nome, Banda banda, Integer duracao) {
		
		this.cod = cod;
		this.nome = nome;
		this.banda = banda;
		this.duracao = duracao;
		
	}
	
	public String toString() {
		return "Musica{ codigo:" + cod + ", nome:" + nome + ", banda:" + banda + ", duracao:" + duracao + " }" ;
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

	public Banda getBanda() {
		return banda;
	}
	public void setBanda(Banda banda) {
		this.banda = banda;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}

	public Integer getDuracao() {
		return duracao;
	}

	public void setDuracao(Integer duracao) {
		this.duracao = duracao;
	}
	
	
	

}
