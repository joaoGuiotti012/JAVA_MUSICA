package musica.beans;

import java.sql.Connection;
import java.sql.DriverManager;

public class Connector {
	private static Connection cnn;

	public static Connection getConnection() throws Exception {
		if (cnn == null || cnn.isClosed()) {
			Class.forName("org.h2.Driver");
			cnn = DriverManager.getConnection("jdbc:h2:~/Desktop/3BCCPP", "sa", "");
		}
		return cnn;
	}
}
