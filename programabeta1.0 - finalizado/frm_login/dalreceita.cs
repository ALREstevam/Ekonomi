using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace frm_login
{
    class dalreceita
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;

        public void inserir(construtor mo)
        {

            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata = mo.datarec.ToString("yyyy-MM-dd");

                string inserir = "INSERT INTO receita (data,tipo,obs,valor,ID_Usuario) values ('" + ndata + "','" + mo.tiporec + "','" + mo.obsrec + "','" + mo.valorec + "','" + id_usuario + "')";

                //string somar = " select sum(salario,aluguel,pensao,horas_extras,salario13,ferias,outros) as total from receita";
                //somar = mo.total;



                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();
            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);
            }


        }
        public void atualizar(construtor con)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            try
            {

                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata = con.datarec.ToString("yyyy-MM-dd");

                string atualizar = "update receita set Id_receita ='" + con.id_receita + "' ,data = '" + ndata + "',tipo = '" + con.tiporec + "',obs = '" + con.obsrec + "' ,valor='"  + con.valorec + 
                 "' where Id_receita = '" + con.id_receita + "';";
                MySqlCommand command = new MySqlCommand(atualizar, conexao);
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
            String caminhobd = "Server=127.0.0.1;DATABASE=tcc;UID=root;PASSWORD=";


            try
            {
                conexao = new MySqlConnection(caminhobd);
                conexao.Open();

                string deleta = "update receita set valido = 'n' where Id_receita = '" + con.id_receita + "';";
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


    

