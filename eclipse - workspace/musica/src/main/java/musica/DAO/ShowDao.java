package musica.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import musica.beans.Connector;
import musica.beans.Show;

public class ShowDao {
	
	
	public Show getShowCod(int codigo) throws Exception {
		ArrayList<Show> resultado = new ArrayList<Show>();
		Connection cnn = Connector.getConnection();
		String sql = "SELECT * FROM SHOW;";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ResultSet rs = ps.executeQuery();
		rs.next();
		Show a = new Show();
		a.setCod(rs.getInt("cod"));
		a.setNome(rs.getString("nome"));
		a.setPreco(rs.getFloat("preco"));
		resultado.add(a);
		rs.close();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel encotrar o aluno");
		}
		ps.close();
		return a;
	}
	
	public void addShow(Show show) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "INSERT INTO SHOW VALUES (?,?,?);";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, show.getCod());
		ps.setString(2, show.getNome());
		ps.setFloat(3, show.getPreco());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel inserir uma Show !");
		}
		ps.close();
	}
	
	
	public ArrayList<Show> getShows() throws Exception {
		ArrayList<Show> resultado = new ArrayList<Show>();
		Connection cnn = Connector.getConnection();
		String sql = "SELECT * FROM SHOW";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ResultSet rs = ps.executeQuery();
		while (rs.next()) {
			Show a = new Show();
			a.setCod(rs.getInt("cod"));
			a.setNome(rs.getString("nome"));
			a.setPreco(rs.getFloat("preco"));
			resultado.add(a);
		}
		rs.close();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel recuperar as/ou Show!");
		}
		ps.close();
		return resultado;
	}
	
	public void remShow(Show a) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "DELETE FROM SHOW WHERE COD = ?";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, a.getCod());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel remover o Shoow");
		}
		ps.close();
	}


}
