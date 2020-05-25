

import java.text.SimpleDateFormat;
import java.time.format.DateTimeFormatter;
import java.util.Date;
import java.util.List;


import javax.swing.JOptionPane;
import musica.DAO.BandaDao;
import musica.DAO.MusicaDao;
import musica.DAO.ShowBandaDao;
import musica.DAO.ShowDao;
import musica.beans.Banda;
import musica.beans.Musica;
import musica.beans.Show;
import musica.beans.ShowBanda;
public class Principal {
	
	public static void main(String[] args) throws Exception {
		DateTimeFormatter formato = DateTimeFormatter.ofPattern("dd/MM/yyyy");
		JOptionPane JP = new JOptionPane(); 
		int OP = Integer.parseInt(JP.showInputDialog(" OPÇÕES: 0[X] 1[+] 2[-] 3[Edit] 4[Exibir] ..:"));
		while (OP != 0 ) {
		BandaDao bandaDao = new BandaDao();	
		
		switch ( OP ) {
		case 1: // ------ ADICIONAR -----------------------------
			OP = Integer.parseInt(JP.showInputDialog("1-[EVENTOS]; 2-[BANDA]; 3-[SHOW]; 4-[MUSICA]="));
		
			if(OP == 1) {
				Integer cod =  Integer.parseInt(JP.showInputDialog("Informe o cod..:")); 
				String nome = JP.showInputDialog("Infome o nome EVENTO: ");
				Integer cod_banda =  Integer.parseInt(JP.showInputDialog("Codigo Banda: ")); 
				int cod_show = Integer.parseInt(JP.showInputDialog("Codigo Show:")); 
				Date data = new SimpleDateFormat("dd/MM/yyyy").parse( JP.showInputDialog("Data: ") );				
				Integer lotacao =  Integer.parseInt(JP.showInputDialog("Quantidade maxima de pessoas: ")); 
				String local = JP.showInputDialog("Informe o local: ");
				
				try {
					Show show = new ShowDao().getShowCod(cod_show);
					Banda banda = new BandaDao().getBandaID(cod_banda);
					ShowBanda NovaSB = new ShowBanda(cod, local, data, lotacao, show, banda);
					System.out.println( cod + local + data + lotacao + show.toString() + banda.toString());
					new ShowBandaDao().addShowBanda(NovaSB);
					
				} catch (Exception e) {
					System.out.println(e);
				}
			
			}
			if(OP == 2) {
				Integer cod =  Integer.parseInt(JP.showInputDialog("Informe o cod..:")); 
				String nome = JP.showInputDialog("Infome o nome da banda..: ");
				Integer integrantes =  Integer.parseInt(JP.showInputDialog("Quantidade Integrantes..:")); 
				Banda NovaBanda = new Banda( cod , nome, integrantes );	
				try {
					
					bandaDao.addBanda(NovaBanda);
				} catch (Exception e2) {
					// TODO Auto-generated catch block
					JP.showMessageDialog(null, e2);
				}				
			}
			if(OP == 3) {
				
				Integer cod =  Integer.parseInt(JP.showInputDialog("Informe o cod:")); 
				String nome = JP.showInputDialog("Infome o nome do show: ");
				float preco =  Float.parseFloat(JP.showInputDialog("Preço: "));
				
				try {
					
					new ShowDao().addShow( new Show( cod , nome , preco  ) );
					
				} catch (Exception e) {
					JP.showMessageDialog(null, e);
				}
				
				
				
			}
			if(OP == 4) {
			    Integer cod = Integer.parseInt(JP.showInputDialog("Informe COD Musica: "));
				String nome = JP.showInputDialog("Infome o nome da Musica: ");
				Integer cod_banda =  Integer.parseInt(JP.showInputDialog("Codigo Banda: ")); 
				Integer duracao = Integer.parseInt(JP.showInputDialog("Informe a duração: "));
				Banda banda = new BandaDao().getBandaID((cod_banda));
				try {
					new MusicaDao().addMusica(new Musica( cod, nome, banda, duracao ));
				} catch (Exception e) {
					JP.showMessageDialog(null, e);
				}
				
			}
			
			if(OP > 4) {
				JP.showMessageDialog(null, "Opção invalido");
			}
			
			break;
			case 2: //---------------- REMOVER ------------------------ 
				OP = Integer.parseInt(JP.showInputDialog("1-[EVENTOS]; 2-[BANDA]; 3-[SHOW]; 4-[MUSICA]="));
				Integer codRem = Integer.parseInt(JP.showInputDialog("informe o cod para remoção: "));
				
				if(OP == 1) {
					try {
						new ShowBandaDao().remShowBanda(new ShowBandaDao().getShowBandaCod(codRem));
					} catch (Exception e) {
						JP.showMessageDialog(null, e);	
					}
				}
				
				if(OP == 2) {
					try {
						new BandaDao().remBanda( new BandaDao().getBandaID(codRem));
					} catch (Exception e) {
						JP.showMessageDialog(null, e);			
					}
				}

				if(OP == 3) {
					try {
						new ShowDao().remShow(new ShowDao().getShowCod(codRem));
					} catch (Exception e) {
						JP.showMessageDialog(null, e);
					}	
					
				}
				
				if(OP == 4) {
					
					try {
						new MusicaDao().remMusica( new MusicaDao().getMusicaCod(codRem));
					} catch (Exception e) {
						JP.showMessageDialog(null, e);
					}
				}

				if(OP > 4) {
					JP.showMessageDialog(null, "Opção invalido");
				}
			
			break;
			
			case 4: // --------------------- EXIBIR -----------------------------
				OP = Integer.parseInt(JP.showInputDialog("1-[EVENTOS]; 2-[BANDA]; 3-[SHOW]; 4-[MUSICA]="));
				
				if(OP == 1) {
					try {
						List<ShowBanda> SB = new ShowBandaDao().getShowBanda();
						for (ShowBanda j : SB) 
							System.out.println(j.toString());
						
					} catch (Exception e) {
						e.printStackTrace();
					}
				}
				if(OP == 2) {
					try {
						List<Banda> bandas = new BandaDao().getBandas();
						for (Banda j : bandas) 
							System.out.println(j.toString());
						
					} catch (Exception e) {
						e.printStackTrace();
					}
				}
				if( OP == 3) {
					try {
						List<Show> shows = new ShowDao().getShows();
						for (Show j : shows) 
							System.out.println(j.toString());
						
					} catch (Exception e) {
						e.printStackTrace();
					}
				}
				if( OP == 4) {
					try {
						List<Musica> musicas = new MusicaDao().getMusicas();
						for (Musica j : musicas) 
							System.out.println(j.toString());
						
					} catch (Exception e) {
						e.printStackTrace();
					}
				}
				if(OP > 4) {
					JP.showMessageDialog(null, "Opção invalido");
				}
				
				
			
					
			break;

		default:
			JP.showMessageDialog(null, "Opção invalido");
		}
		OP = Integer.parseInt(JP.showInputDialog(" OPÇÕES: 0[X] 1[+] 2[-] 3[Edit] 4[Exibir] ..:"));
		
		}
		
	}

}
