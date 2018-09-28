using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace frm_login
{
    class dalMeta
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;

        public void inserirMeta(construtor mo)
        {

            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD= ";

            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string DataM = mo.Data_Meta.ToString("yyyy/MM/dd");//converte para o formato DateTime mysql
                string inserir = "INSERT INTO meta(metas, data, valor, ID_Usuario) values ('" + mo.Nome_Meta + "','" + DataM + "','" + mo.Valor_Meta + "','" + id_usuario + "')";

                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();
            }

            catch (Exception ex)
            {
                throw new Exception("Erroooo" + ex.Message);
            }
        }


        public void atualizar(construtor con)
        {

            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD= ";

            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string DataM = con.Data_Meta.ToString("yyyy/MM/dd");
                string att = "update meta set id_meta='" + con.id_meta + "', metas='" + con.Nome_Meta +
                   "', data='" + DataM + "', valor='" + con.Valor_Meta + "', ID_Usuario='" +id_usuario+ "' where id_meta='" + con.id_meta + "';";

                MySqlCommand command = new MySqlCommand(att, conexao);
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

                string deleta = "update meta set valido = 'n' where id_meta='" + con.id_meta + "';";
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
