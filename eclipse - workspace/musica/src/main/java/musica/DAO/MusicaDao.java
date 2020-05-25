package musica.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import musica.beans.Connector;
import musica.beans.Musica;
import musica.beans.ShowBanda;

public class MusicaDao {
	public void addMusica(Musica musica) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "INSERT INTO MUSICA VALUES (?,?,?,?);";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, musica.getCod());
		ps.setString(2, musica.getNome());
		ps.setInt(3, musica.getBanda().getCod());
		ps.setInt(4, musica.getDuracao());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel inserir uma Musica !");
		}
		ps.close();
	}
	
	
	
	public ArrayList<Musica> getMusicas() throws Exception {
		BandaDao daoBanda = new BandaDao();
		ArrayList<Musica> resultado = new ArrayList<Musica>();
		Connection cnn = Connector.getConnection();
		String sql = "SELECT * FROM MUSICA";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ResultSet rs = ps.executeQuery();
		while (rs.next()) {
			Musica a = new Musica();
			a.setCod(rs.getInt("cod"));
			a.setNome(rs.getString("nome"));
			a.setBanda(daoBanda.getBandaID((rs.getInt("banda"))));			
			a.setDuracao(rs.getInt("duracao"));
			resultado.add(a);
		}
		rs.close();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel recuperar as/ou Musica!");
		}
		ps.close();
		return resultado;
	}
	
	public void remMusica(Musica a) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "DELETE FROM MUSICA WHERE COD = ?";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, a.getCod());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel remover a Musica");
		}
		ps.close();
	}
	
	public Musica  getMusicaCod( Integer id) throws Exception{
		ArrayList<Musica> lista = this.getMusicas();
		for( Musica s : lista ) {
			if( s.getCod() == id ) return s;
		}
		return null;
	}
}
