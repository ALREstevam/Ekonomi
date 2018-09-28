using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace frm_login
{
    class dalinvestimento
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;

        public void inserir(construtor mo)
        {
            String caminhobd = "Server= 127.0.0.1; DATABASE = tcc; UID = root; PASSWORD = ";

            try
            {
                conexao = new MySqlConnection(caminhobd);
                conexao.Open();

                string ndata = mo.datai.ToString("yyyy-MM-dd");

                string inserir = "INSERT INTO investimento(Tipo,OBS,Data,Valor,ID_Usuario) values ('" + mo.tipoi + "','" + mo.obs +
                    "','" + ndata + "','" + mo.valori + "','" + id_usuario + "')";

                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();
            }

            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }
        }

        public void sucesso(construtor con)
        {
            String caminhobd = "SERVER= 127.0.0.1; DATABASE = tcc; UID = root; PASSWORD = ";

            try
            {
                conexao = new MySqlConnection(caminhobd);
                conexao.Open();

                string ndata = con.datai.ToString("yyyy-MM-dd");

                string editar = "update investimento set ID_Investimento='" + con.id_investimento + "', Tipo='" + con.tipoi +
                    "', OBS='" + con.obs + "', Data='" + ndata + "', Valor='" + con.valori + "' where ID_Investimento='" + con.id_investimento + "';";

                MySqlCommand command = new MySqlCommand(editar, conexao);
                MySqlDataReader myreader;
                myreader = command.ExecuteReader();
            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }
        }

        public void deletar(construtor con)
        {
            String caminhobd = "SERVER= 127.0.0.1; DATABASE = tcc; UID = root; PASSWORD = ";

            try
            {
                conexao = new MySqlConnection(caminhobd);
                conexao.Open();

                string deleta = "update investimento set valido = 'n' where ID_Investimento='" + con.id_investimento + "';";
                MySqlCommand command = new MySqlCommand(deleta, conexao);
                MySqlDataReader myreader;

                myreader = command.ExecuteReader();

            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }

        }
    }
}
