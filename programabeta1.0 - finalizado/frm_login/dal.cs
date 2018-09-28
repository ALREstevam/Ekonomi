using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
namespace frm_login
{
    class dal
    {

        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;

        public void cadastro(construtor mo)
        {
          String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";
            
            
            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata = mo.data.ToString("yyyy-MM-dd");
                
             
                string inserir =  "INSERT INTO despesas(Despesa,Tipo,Valor,Data,Categoria,Descricao,ID_Usuario) values  ('" + mo.despesa + "','" + mo.tipo + "','" +
                    mo.valor + "','" + ndata + "','" + mo.categoria + "','" + mo.desc + "' ,'" + id_usuario + "')";


                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();

            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
                
            }
        }

        public void alterar(construtor con)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            try
            {

                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata = con.data.ToString("yyyy-MM-dd");

                string alterar = "update despesa set Id_despesa='" + con.id_despesa + "',Despesa ='" + con.despesa +
                    "',Tipo = '" + con.tipo + "',Valor = '" + con.valor + "',Data ='" + ndata + "',Categoria ='" + con.categoria +
                    "',Descricao ='" + con.desc + "',ID_Usuario='" + id_usuario + "' where Id_despesa = '" + con.id_despesa + "';";
                MySqlCommand command = new MySqlCommand(alterar, conexao);
                MySqlDataReader myreader;
                myreader = command.ExecuteReader();

            }

            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }

        }

        public void deleta(construtor con)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string deleta = "update despesas set valido = 'n' where Id_despesa='" + con.id_despesa + "';";
                MySqlCommand command = new MySqlCommand(deleta, conexao);
                MySqlDataReader myreader;

                myreader = command.ExecuteReader();
            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }
        }

        public void parcela_desp(construtor mo)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";


            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata1 = mo.data_parc.ToString("yyyy-MM-dd");

                string inserir = "INSERT INTO parcela(Data_parcela,valor_parcela,nparcelas,Id_despesa) values  ('" + ndata1 + "','" + mo.valor_parc + "','" + mo.n_parcelas + "','" + mo.id_despesa + "')";

                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();

            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);

            }

        }

        //public void deleta_parc(construtor con)
        //{
        //    String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";


        //     try
        //    {
        //        conexao = new MySqlConnection(caminhodb);
        //        conexao.Open();

        //        string deleta = "delete from parcela where id_parc='" + con.id_parcela + "';";
        //        MySqlCommand command = new MySqlCommand(deleta, conexao);
        //        MySqlDataReader myreader;

        //        myreader = command.ExecuteReader();
        //    }
        //     catch (Exception ex)
        //     {
        //         throw new Exception("Erro de comandos" + ex.Message);
        //     }




        //}

       
            
        }
    }


            



