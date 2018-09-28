using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;

namespace frm_login
{
    class dal_parcela
    {
        private MySqlConnection conexao;

        public void inserir(construtor mo)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";


            try
            {
                conexao = new MySqlConnection(caminhodb);
                conexao.Open();

                string ndata = mo.data.ToString("yyyy-MM-dd");

                string inserir = "INSERT INTO despesas(Despesa,Tipo,Valor,Data,Categoria,Descricao,NParcelas) values  ('" + mo.despesa + "','" + mo.tipo + "','" +
                    mo.valor + "','" + ndata + "','" + mo.categoria + "','" + mo.desc + "', '" + mo.n_parcelas + "')";

                MySqlCommand comandos = new MySqlCommand(inserir, conexao);
                comandos.ExecuteNonQuery();
                conexao.Close();

            }
            catch (Exception ex)
            {
                throw new Exception("Erro de comandos" + ex.Message);

            }

        }
    }
}

