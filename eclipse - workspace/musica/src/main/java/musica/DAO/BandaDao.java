package musica.DAO;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import musica.beans.Banda;
import musica.beans.Connector;
import musica.beans.Show;





public class BandaDao {
	
		public void addBanda(Banda banda) throws Exception {
			Connection cnn = Connector.getConnection();
			String sql = "INSERT INTO BANDA VALUES (?,?,?);";
			PreparedStatement ps = cnn.prepareStatement(sql);
			ps.setInt(1, banda.getCod());
			ps.setString(2, banda.getNome());
			ps.setInt(3, banda.getIntegrantes());
			ps.execute();
			if(!ps.execute()) {
				throw new Exception("nao foi possivel inserir uma banda !");
			}
			ps.close();
		}
		
		public Banda  getBandaID( Integer id) throws Exception{
			ArrayList<Banda> lista = this.getBandas();
			for( Banda s : lista ) {
				if( s.getCod() == id ) return s;
			}
			return null;
		}
		
		public ArrayList<Banda> getBandas() throws Exception {
			ArrayList<Banda> resultado = new ArrayList<Banda>();
			Connection cnn = Connector.getConnection();
			String sql = "SELECT * FROM BANDA";
			PreparedStatement ps = cnn.prepareStatement(sql);
			ResultSet rs = ps.executeQuery();
			while (rs.next()) {
				Banda a = new Banda();
				a.setCod(rs.getInt("cod"));
				a.setNome(rs.getString("nome"));
				a.setIntegrantes(rs.getInt("integrantes"));
				resultado.add(a);
			}
			rs.close();
			if(!ps.execute()) {
				throw new Exception("nao foi possivel recuperar as/ou bandas!");
			}
			ps.close();
			return resultado;
		}
		
		public void remBanda(Banda a) throws Exception {
			Connection cnn = Connector.getConnection();
			String sql = "DELETE FROM BANDA WHERE COD = ?";
			PreparedStatement ps = cnn.prepareStatement(sql);
			ps.setInt(1, a.getCod());
			ps.execute();
			if(!ps.execute()) {
				throw new Exception("nao foi possivel remover o aluno");
			}
			ps.close();
		}

}
