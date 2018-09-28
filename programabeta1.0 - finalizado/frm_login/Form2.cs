using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using frm_login;

namespace Form_Calendario
{
    public partial class Form2 : Form
    {
      
        public MySqlConnection conexao = new MySqlConnection();

        String id_usuario = Usuario.ID_Usuario;

        

        String bd_nome = "tcc", bd_user = "root", bd_pass = "";
        //CONFIGURAÇÃO







        String dataInicio_txt, dataFim_txt, dataInicio_SQL, dataFim_SQL;
          String selecionado;
        String EsseMes, EsseAno, data1_SQL, data2_SQL;
        DateTime ultimoDiaDoMes;
        float totalDespesas, totalInvestimento, totalReceita, totalMetas, totalResult;
        

        public Form2()
        {
            InitializeComponent();

            DateTime now = DateTime.Now;
            monthCalendar1.TodayDate = DateTime.Now;

            DateTime dtfrom = DateTime.Now;

            EsseMes = now.ToString("MM");
            EsseAno = now.ToString("yyyy");

            String primDia = "01/" + EsseMes + "/" + EsseAno;
            label1_data1.Text = primDia;
            data1_SQL = EsseAno + "-" + EsseMes + "-01";

            // Obtém a data corrente

            DateTime hoje_dia = monthCalendar1.SelectionStart;

            // Agora obtém o primeiro dia do mês corrente
            DateTime primeiroDiaDoMes = new DateTime(hoje_dia.Year, hoje_dia.Month, 01);

            // Adiciona 1 mês no primeiro dia do mês corrente, para obtermos
            // o primeiro dia do próximo mes
            DateTime primeiroDiaDoProximoMes = primeiroDiaDoMes.AddMonths(1);

            // Finalmente, diminuimos 1 dia do primeiro dia do próximo mês,
            // e deixamos a classe DateTime calcular o último dia do mês anterior :)
            ultimoDiaDoMes = primeiroDiaDoProximoMes.AddDays(-1);

            label2_data2.Text = ultimoDiaDoMes.ToShortDateString();


            
        }



        private void dateTimePicker1_dataInicio_ValueChanged(object sender, EventArgs e)
        {
           dataInicio_txt =  dateTimePicker1_dataInicio.Value.Date.ToString("dd/MM/yyyy");
           dataInicio_SQL = dateTimePicker1_dataInicio.Value.Date.ToString("yyyy-MM-dd");

           label1_data1.Text = dataInicio_txt;
        }

        private void dateTimePicker2dataFim_ValueChanged(object sender, EventArgs e)
        {
            dataFim_txt = dateTimePicker2dataFim.Value.Date.ToString("dd/MM/yyyy");
            dataFim_SQL = dateTimePicker2dataFim.Value.Date.ToString("yyyy-MM-dd");

            label2_data2.Text = dataFim_txt;

   
        }

       
        
        
        
       //BOTÃO PESQUISA CLICADO!!!! 
        private void button1_pesquisar_Click(object sender, EventArgs e)
        {

            listBox1_despesa.Items.Clear();
            listBox2_receita.Items.Clear();
            listBox3_investimento.Items.Clear();
            listBox4_metas.Items.Clear();



            totalResult = 0;
            label21_total_resultado.Text = "0,00";

            
           //ZERA DESPESAS 
            totalDespesas = 0;
            label4_despesa.Text = "0,00";

            //ZERA INVESTIMENTO
            totalInvestimento = 0;
            label19_investimentos.Text = "0,00";


            //ZERA RECEITA
            totalReceita = 0;
            label17_receita.Text = "0,00";


            //TOTAL METAS
            totalMetas = 0;
            label6_metas.Text = "0,00";

            string[] split_menor = label1_data1.Text.Split(new Char[] { '/' });

            //string correctString = resultado.Replace("-",", ");
            string diaMenor = split_menor[0].ToString();
            string mesMenor = split_menor[1].ToString();
            string anoMenor = split_menor[2].ToString();

            data1_SQL = anoMenor + "-" + mesMenor + "-" + diaMenor;



            //////////////////////////////////////////////////////////

            string[] split_maior = label2_data2.Text.Split(new Char[] { '/' });

            //string correctString = resultado.Replace("-",", ");
            string diaMaior = split_maior[0].ToString();
            string mesMaior = split_maior[1].ToString();
            string anoMaior = split_maior[2].ToString();

            data2_SQL = anoMaior + "-" + mesMaior + "-" + diaMaior;


            //label2.Text = data1_SQL;
            //label14.Text = data2_SQL;


            try  //DESPESAS!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            {
                string caminhodb = "Server=127.0.0.1;DATABASE=" + bd_nome + ";UID=" + bd_user + ";PASSWORD=" + bd_pass + "";
                conexao = new MySqlConnection(caminhodb);//tentar uma conexão
                conexao.Open();//abrir banco

               // var pesquisa = "SELECT * FROM despesas WHERE ID_Usuario LIKE '" + id_usuario + "' AND Data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' ORDER BY Data ASC";
                var pesquisa = "SELECT * FROM despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa WHERE ID_Usuario LIKE '" + id_usuario + "' AND Data_parcela BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' AND valido LIKE 's' ORDER BY Data_parcela ASC";
                
                
               // MessageBox.Show(pesquisa);
                MySqlCommand comando = new MySqlCommand(pesquisa, conexao);
 
                MySqlDataReader leitor;
                leitor = comando.ExecuteReader();

                //enquanto leitor lê 
                while (leitor.Read())
                {
                    //para cada iteração adiciono o nome 
                    //ao listbox 




                    
                  String dataQuery = leitor["Data_parcela"].ToString();

                  string[] splitDataQuery = dataQuery.Split(new Char[] { ' ' });

                  //string correctString = resultado.Replace("-",", ");
                  string dataVerdadeira = splitDataQuery[0].ToString();
                  string Lixo = splitDataQuery[1].ToString();



                  String listLinha = dataVerdadeira + " - " + leitor["Tipo"].ToString() + " / " + leitor["Categoria"].ToString() + ": " + leitor["Descricao"].ToString() + "  R$" + leitor["valor_parcela"].ToString();
                   listBox1_despesa.Items.Add(listLinha);


                    String valorString = leitor["valor_parcela"].ToString();
                    float valorFloat = float.Parse(valorString);


                  
                     totalDespesas = valorFloat + totalDespesas;
                     label4_despesa.Text = totalDespesas.ToString();
                }

                //fecha conexão 
                conexao.Close();

            }
            catch (Exception)
            {
                conexao.Close();
                MessageBox.Show("Algo deu terrivelmente errado", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }






          

            /////////////////// INVESTIMENTO 

            try
            {
                string caminhodb = "Server=127.0.0.1;DATABASE="+bd_nome+";UID="+bd_user+";PASSWORD="+bd_pass+"";
                conexao = new MySqlConnection(caminhodb);//tentar uma conexão
                conexao.Open();//abrir banco

                var pesquisa = "SELECT * FROM investimento WHERE ID_Usuario LIKE '" + id_usuario + "' AND Data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' AND valido LIKE 's' ORDER BY Data ASC";
                //MessageBox.Show(pesquisa);
                MySqlCommand comando = new MySqlCommand(pesquisa, conexao);
                MySqlDataReader leitor;
                leitor = comando.ExecuteReader();

                //enquanto leitor lê 
                while (leitor.Read())
                {
                    //para cada iteração adiciono o nome 
                    //ao listbox 





                    String dataQuery = leitor["Data"].ToString();

                    string[] splitDataQuery = dataQuery.Split(new Char[] { ' ' });

                    //string correctString = resultado.Replace("-",", ");
                    string dataVerdadeira = splitDataQuery[0].ToString();
                    string Lixo = splitDataQuery[1].ToString();



                   // String listLinha = dataVerdadeira + " - " + leitor["Tipo"].ToString() + " / " + leitor["Categoria"].ToString() + ": " + leitor["Descricao"].ToString() + "  R$" + leitor["Valor"].ToString();
                     String listLinha = dataVerdadeira + " - " + leitor["Tipo"].ToString() + ": " + leitor["OBS"].ToString() + "  R$" + leitor["Valor"].ToString();
 

                    listBox3_investimento.Items.Add(listLinha);


                    String valorString = leitor["Valor"].ToString();
                    float valorFloat = float.Parse(valorString);



                    totalInvestimento = valorFloat + totalInvestimento;
                    label19_investimentos.Text = totalInvestimento.ToString();
                }

                //fecha conexão 
                conexao.Close();

            }
            catch (Exception ex)
            {
                conexao.Close();
                MessageBox.Show("Algo deu terrivelmente errado: \n"+ex.Message, "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error );
            }









            /////////////////// RECEITA 

            try
            {
                string caminhodb = "Server=127.0.0.1;DATABASE=" + bd_nome + ";UID=" + bd_user + ";PASSWORD=" + bd_pass + "";
                conexao = new MySqlConnection(caminhodb);//tentar uma conexão
                conexao.Open();//abrir banco

                var pesquisa = "SELECT * FROM receita WHERE ID_Usuario LIKE '" + id_usuario + "' AND data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' AND valido LIKE 's' ORDER BY data ASC";
                //MessageBox.Show(pesquisa);
                MySqlCommand comando = new MySqlCommand(pesquisa, conexao);
                MySqlDataReader leitor;
                leitor = comando.ExecuteReader();

                //enquanto leitor lê 
                while (leitor.Read())
                {
                    //para cada iteração adiciono o nome 
                    //ao listbox 





                    String dataQuery = leitor["data"].ToString();

                    string[] splitDataQuery = dataQuery.Split(new Char[] { ' ' });

                    //string correctString = resultado.Replace("-",", ");
                    string dataVerdadeira = splitDataQuery[0].ToString();
                    string Lixo = splitDataQuery[1].ToString();



                    // String listLinha = dataVerdadeira + " - " + leitor["Tipo"].ToString() + " / " + leitor["Categoria"].ToString() + ": " + leitor["Descricao"].ToString() + "  R$" + leitor["Valor"].ToString();
                    String listLinha = dataVerdadeira + " - " + leitor["tipo"].ToString() + ": " + leitor["obs"].ToString() + "  R$" + leitor["valor"].ToString();


                    listBox2_receita.Items.Add(listLinha);


                    String valorString = leitor["valor"].ToString();
                    float valorFloat = float.Parse(valorString);



                    totalReceita = valorFloat + totalReceita;
                    label17_receita.Text = totalReceita.ToString();
                }

                //fecha conexão 
                conexao.Close();

            }
            catch (Exception ex)
            {
                conexao.Close();
                MessageBox.Show("Algo deu terrivelmente errado: \n" + ex.Message, "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }



            totalResult = (totalReceita - (totalDespesas + totalInvestimento));

            label21_total_resultado.Text = totalResult.ToString();













            /////////////////// METAS 

            try
            {
                string caminhodb = "Server=127.0.0.1;DATABASE=" + bd_nome + ";UID=" + bd_user + ";PASSWORD=" + bd_pass + "";
                conexao = new MySqlConnection(caminhodb);//tentar uma conexão
                conexao.Open();//abrir banco

                var pesquisa = "SELECT * FROM meta WHERE ID_Usuario LIKE '" + id_usuario + "' AND data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' AND valido LIKE 's' ORDER BY data ASC";
                //MessageBox.Show(pesquisa);
                MySqlCommand comando = new MySqlCommand(pesquisa, conexao);
                MySqlDataReader leitor;
                leitor = comando.ExecuteReader();

                //enquanto leitor lê 
                while (leitor.Read())
                {
                    //para cada iteração adiciono o nome 
                    //ao listbox 
                    String podeisso;

                    String valorString_meta = leitor["valor"].ToString();
                    float valorFloat_meta = float.Parse(valorString_meta);
                    float metaUnicaValor;

                    



                    String dataQuery = leitor["data"].ToString();

                    string[] splitDataQuery = dataQuery.Split(new Char[] { ' ' });

                    //string correctString = resultado.Replace("-",", ");
                    string dataVerdadeira = splitDataQuery[0].ToString();
                    string Lixo = splitDataQuery[1].ToString();



                   //Calcula quanto falta
                   metaUnicaValor = totalResult - valorFloat_meta;
                   
                   // MessageBox.Show("totalResult  " +totalResult+" \n  valorfloatmeta  "+ valorFloat_meta);
                    
                    
               

                   podeisso = "";





                    if (totalResult > valorFloat_meta) {
                       podeisso = "Você tem a quantia necessária";
                   }
                   else if (totalResult == valorFloat_meta) {
                       podeisso = "Você tem exatamente a quantia necessária";
                   
                   }
                   else {
                      
                    if (totalResult >= 0)
                    {
                        metaUnicaValor = valorFloat_meta - totalResult;
                    }

                    else
                    {
                        metaUnicaValor = (totalResult * -1) + (valorFloat_meta);
                    }
                    


                       podeisso = "Faltam R$ " + metaUnicaValor;

                   }
                    

                    // String listLinha = dataVerdadeira + " - " + leitor["Tipo"].ToString() + " / " + leitor["Categoria"].ToString() + ": " + leitor["Descricao"].ToString() + "  R$" + leitor["Valor"].ToString();
                   String listLinha = dataVerdadeira + " - " + leitor["metas"].ToString() + ":  R$" + leitor["valor"].ToString() + "  " + podeisso+"";


                    listBox4_metas.Items.Add(listLinha);


                    String valorString = leitor["valor"].ToString();
                    float valorFloat = float.Parse(valorString);



                    totalMetas = valorFloat + totalMetas;
                    label6_metas.Text = totalMetas.ToString();
                }

                //fecha conexão 
                conexao.Close();

            }
            catch (Exception ex)
            {
                conexao.Close();
                MessageBox.Show("Erro ao tratar metas: \n" + ex.Message, "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }















            




        }

        
        private void TabControl_SelectedIndexChanged(object sender, EventArgs e)
        {
            LabelSelectedF.Text = "Campo selecionado";
        }

       
        
        
        
        private void listBox1_despesa_SelectedIndexChanged(object sender, EventArgs e)
        {
             selecionado = listBox1_despesa.GetItemText(listBox1_despesa.SelectedItem);
             listbox_selecionado();
        }

        private void listBox2_receita_SelectedIndexChanged(object sender, EventArgs e)
        {
            selecionado = listBox2_receita.GetItemText(listBox2_receita.SelectedItem);
            listbox_selecionado();
        }

        private void listBox3_investimento_SelectedIndexChanged(object sender, EventArgs e)
        {
            selecionado = listBox3_investimento.GetItemText(listBox3_investimento.SelectedItem);
            listbox_selecionado();
        }

        private void listBox4_metas_SelectedIndexChanged(object sender, EventArgs e)
        {
            selecionado = listBox4_metas.GetItemText(listBox4_metas.SelectedItem);
            listbox_selecionado();
        }

        public void listbox_selecionado()
        {
            LabelSelectedF.Text = selecionado;
        }

        private void Form2_Load(object sender, EventArgs e)
        {

        }


   

  
   
    }
}
