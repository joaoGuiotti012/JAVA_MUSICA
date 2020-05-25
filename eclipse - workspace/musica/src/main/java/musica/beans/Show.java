package musica.beans;



public class Show {
	private Integer cod;
	private String nome;
	private float preco;
	
	public Show() {
			
	}
	
	public Show(Integer cod, String nome, float preco  ) {
		this.cod = cod;
		this.nome = nome;
		this.preco = preco;
	
		
	}
	public String toString() {
		return "Show{ codigo:" + cod + ", nome:" + nome + ", preco: R$" + preco  + " }" ;
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
	public float getPreco() {
		return preco;
	}
	public void setPreco(float preco) {
		this.preco = preco;
	}
	
	

}
