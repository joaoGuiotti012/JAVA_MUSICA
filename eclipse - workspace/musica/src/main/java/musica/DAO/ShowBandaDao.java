package musica.DAO;

import java.sql.Connection;
import java.util.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

import musica.beans.Banda;
import musica.beans.Connector;
import musica.beans.ShowBanda;


public class ShowBandaDao {
	public void remShowBanda(ShowBanda a) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "DELETE FROM SHOWBANDA WHERE COD = ?";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, a.getCod());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel remover");
		}
		ps.close();
	}


	public void addShowBanda(ShowBanda SB) throws Exception {
		Connection cnn = Connector.getConnection();
		String sql = "INSERT INTO SHOWBANDA VALUES (?,?,?,?,?,?);";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ps.setInt(1, SB.getCod());
		ps.setString(2 , SB.getLocal());
		ps.setDate( 3, new java.sql.Date( SB.getData().getTime()));
		ps.setInt(4, SB.getLotacao());
		ps.setInt(5, SB.getBanda().getCod());
		ps.setInt(6, SB.getShow().getCod());
		ps.execute();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel inserir");
		}
		ps.close();
	}
	
	
	public ArrayList<ShowBanda> getShowBanda() throws Exception {
		BandaDao daoBanda = new BandaDao();
		ShowDao daoShow = new ShowDao();
		ArrayList<ShowBanda> resultado = new ArrayList<ShowBanda>();
		Connection cnn = Connector.getConnection();
		String sql = "SELECT * FROM SHOWBANDA";
		PreparedStatement ps = cnn.prepareStatement(sql);
		ResultSet rs = ps.executeQuery();
		while (rs.next()) {
			ShowBanda SB = new ShowBanda();
			SB.setCod(rs.getInt("cod"));
			SB.setLocal(rs.getString("local"));
			SB.setData(rs.getDate("datahr"));
			SB.setLotacao(rs.getInt("lotacao"));
			SB.setBanda(daoBanda.getBandaID((rs.getInt("banda"))));
			SB.setShow(daoShow.getShowCod((rs.getInt("show"))));
			resultado.add(SB);
		}
		rs.close();
		if(!ps.execute()) {
			throw new Exception("nao foi possivel realizar a busca");
		}
		ps.close();
		return resultado;
	}
	
	public ShowBanda  getShowBandaCod( Integer id) throws Exception{
		ArrayList<ShowBanda> lista = this.getShowBanda();
		for( ShowBanda s : lista ) {
			if( s.getCod() == id ) return s;
		}
		return null;
	}
}
