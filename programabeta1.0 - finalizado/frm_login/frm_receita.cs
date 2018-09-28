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

namespace frm_login
{
    public partial class frm_receita : Form
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;
        String dataInicio_txt, dataFim_txt, dataInicio_SQL, dataFim_SQL;
        //OBS: TXT = formato normal 12/34/5678   
        // SQL = formato do sql

        String EsseMes, EsseAno, data1_SQL, data2_SQL;
        DateTime ultimoDiaDoMes;

        public frm_receita()
        {
            InitializeComponent();

            DateTime now = DateTime.Now; //PEGA A DATA DE HOJE
            monthCalendar1.TodayDate = DateTime.Now; //SETA A DATA DO MONTHCALENDAR PARA A DATA DE HOJE

            DateTime dtfrom = DateTime.Now;  //COLOCA COISAS EM FORMATO CORRETO OU ALGO ASSIM

            EsseMes = now.ToString("MM");
            EsseAno = now.ToString("yyyy");

            String primDia = "01/" + EsseMes + "/" + EsseAno; //CONFIGURA A DATA DO PRIMEIRO DIA DO MÊS ATUAL


            label5.Text = primDia; //ESCREVE ESSA DATA NO LABEL


            data1_SQL = EsseAno + "-" + EsseMes + "-01"; //PASSA A DATA PARA O FORMATO ACEITO NO SQL

            /* CÓDIGO PARA PEGAR O ÚLTIMO DIA DO MES*/
            DateTime hoje_dia = monthCalendar1.SelectionStart;//PEGA A DATA JÁ MARCADA NO MONTH CALENDAR
            DateTime primeiroDiaDoMes = new DateTime(hoje_dia.Year, hoje_dia.Month, 01);//CRIA UM DATETIME COM O PRIMEIRO DIA DO MÊS ATUAL EX: 2015-10-01


            DateTime primeiroDiaDoProximoMes = primeiroDiaDoMes.AddMonths(1);//SOMA 1 MES NO PRIMEIRO DIA DESSE MÊS, FICANDO COM O PRIMEIRO DIA DO PRÓXIMO MÊS 2015-11-01

            //ESTANDO NO PRIMEIRO DIA DO PRÓXIMO MÊS ENTÃO É SÓ TIRAR 1 DIA QUE O ÚLTIMO DIA DO MÊS ATUAL VAI APARECER
            ultimoDiaDoMes = primeiroDiaDoProximoMes.AddDays(-1);

            label6.Text = ultimoDiaDoMes.ToShortDateString();
        }


        private void button2_Click(object sender, EventArgs e)
        {

            if

           (MessageBox.Show(("Deseja limpar os campos?"), "Limpar", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
            {
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
                maskedTextBox1.Clear();
                comboBox1.Text = "";
                dataGridView1.Columns.Clear();
            }
            else
            {

            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            maskedTextBox1.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
            if (comboBox1.Text == "Selecione" || textBox1.Text == "" || textBox2.Text == "" || maskedTextBox1.Text == "")
            {
                MessageBox.Show("Favor, complete todos os campos!",
             "Aviso!",
             MessageBoxButtons.OK,
             MessageBoxIcon.Exclamation,
             MessageBoxDefaultButton.Button1);
            }
            else
            {
                maskedTextBox1.TextMaskFormat = MaskFormat.IncludePromptAndLiterals;
                construtor mo = new construtor();
                dalreceita dare = new dalreceita();
                String maoe = Convert.ToString(textBox2.Text);
                mo.valorec = maoe.Replace(",", ".");
                mo.tiporec = comboBox1.Text;
                mo.datarec = Convert.ToDateTime(maskedTextBox1.Text);
                mo.obsrec = textBox1.Text;

                dare.inserir(mo);
                MessageBox.Show("Dados salvos com sucesso!", "Ekonomi",MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                limpar();
            }
        }



        private void button3_Click(object sender, EventArgs e)
        {
            if (comboBox1.Text == "Selecione" || textBox1.Text == "" || textBox2.Text == "" || maskedTextBox1.Text == "")
            {
                MessageBox.Show("Favor, complete todos os campos!",
             "Aviso!",
             MessageBoxButtons.OK,
             MessageBoxIcon.Exclamation,
             MessageBoxDefaultButton.Button1);
            }
            else
            {
                maskedTextBox1.TextMaskFormat = MaskFormat.IncludePromptAndLiterals;
                construtor mo = new construtor();
                dalreceita dare = new dalreceita();
                mo.id_receita = Convert.ToInt16(textBox3.Text);
                String maoe = Convert.ToString(textBox2.Text);
                mo.valorec = maoe.Replace(",", ".");
                mo.tiporec = comboBox1.Text;
                mo.datarec = Convert.ToDateTime(maskedTextBox1.Text);
                mo.obsrec = textBox1.Text;

                dare.atualizar(mo);
                MessageBox.Show("Dados atualizados com sucesso!", "Ekonomi",MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                limpar();
            }
        }
        private void button4_Click(object sender, EventArgs e)
        {
            if (textBox3.Text == "")
            {
                MessageBox.Show("Um dado deve ser pesquisado antes de ser excluido!",
               "Aviso!",
               MessageBoxButtons.OK,
               MessageBoxIcon.Exclamation,
               MessageBoxDefaultButton.Button1);
            }
            else
            {
                if

               (MessageBox.Show(("Deseja excluir todos os dados?"), "Excluir?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
                {
                    try
                    {
                        construtor mo = new construtor();
                        dalreceita dare = new dalreceita();
                        mo.id_receita = Convert.ToInt16(textBox3.Text);
                        dare.deleta(mo);
                        MessageBox.Show("Dados excluidos com sucesso!", "Ekonomi",
                        MessageBoxButtons.OKCancel, MessageBoxIcon.Asterisk);
                        limpar();

                    }
                    catch (Exception ex)
                    {
                        throw new Exception("Não encontrado. Digite um código válido!" + ex.Message);
                    }
                }
                else
                {

                }
            }
        }
      private void limpar()
        {

            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            maskedTextBox1.Clear();
            comboBox1.Text = "";
            comboBox2.Text = "Selecione";

          
      }
      private void button5_Click(object sender, EventArgs e)
      {
          String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

          conexao = new MySqlConnection(caminhodb);
          conexao.Open();
          String op = (String)comboBox2.SelectedItem;
          {
              switch (op)
              {
                  case "Mês":

                      string[] split_menor1 = label5.Text.Split(new Char[] { '/' }); //PEGA O VALOR DA LABEL (MENOR DATA) E QUEBRA SEMPRE QUE APARECER UMA /
                      //EX: 01/10/2015



                      //string correctString = resultado.Replace("-",", "); //ISSO NÃO FUNCIONOU
                      string diaMenor1 = split_menor1[0].ToString(); //PRIMEIRO VALOR É  O DIA      EX: 01
                      string mesMenor1 = split_menor1[1].ToString(); //SEGUNDO VALOR É O MÊS        EX: 10  
                      string anoMenor1 = split_menor1[2].ToString(); //TERCEIRO VALOR É O ANO       EX: 2015

                      data1_SQL = anoMenor1 + "-" + mesMenor1 + "-" + diaMenor1;



                      //////////////////////////////////////////////////////////


                      //FAZ A MEESMA COISA PARA O VALOR DA SEGUNDA LABEL QUE É A DATA MAIOR
                      string[] split_maior = label6.Text.Split(new Char[] { '/' });

                      //string correctString = resultado.Replace("-",", "); //ISSO NÃO FUNCIONOU
                      string diaMaior = split_maior[0].ToString();
                      string mesMaior = split_maior[1].ToString();
                      string anoMaior = split_maior[2].ToString();

                      data2_SQL = anoMaior + "-" + mesMaior + "-" + diaMaior;


                      //label2.Text = data1_SQL;
                      //label14.Text = data2_SQL;

                      var pesquisa = "SELECT * FROM receita WHERE Data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "'and ID_Usuario like'" + id_usuario + "' and valido like 's' ORDER BY Data ASC";
                      //  var pesquisa = "SELECT * FROM despesas WHERE ID_Usuario LIKE '" + id_usuario + "' AND Data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' ORDER BY Data ASC";   
                      //                  seleciona tudo da tabela despesas onde ID USUARIO = O ID DO CARA QUE LOGOU  E DATA  ENTRE A DATA DA label1 e fa label 2 ordenando por DATA(A DO BANCO) DE MANEIRA ASCENDENTE
                      //OBS: NO BANCO A DATA DEVE ESTAR NO FORMATO DATE



                      //MessageBox.Show(pesquisa);
                      MySqlCommand comando = new MySqlCommand(pesquisa, conexao);
                      MySqlDataAdapter ad = new MySqlDataAdapter(pesquisa, conexao);
                      //MySqlDataAdapter ad2 = new MySqlDataAdapter(pesquisa, conexao);
                      ad.SelectCommand.Parameters.AddWithValue("valor", label5.Text + "%");
                      //ad2.SelectCommand.Parameters.AddWithValue("valor", label9.Text + "%");
                      DataTable table = new DataTable();
                      ad.Fill(table);
                      //ad2.Fill(table);
                      dataGridView1.DataSource = table;
                      this.dataGridView1.Columns[0].Visible = false;
                      this.dataGridView1.Columns[1].Visible = false;
                      this.dataGridView1.Columns[6].Visible = false;
                      conexao.Close();
                      break;
                  case "Data":

                      string[] split_menor = label5.Text.Split(new Char[] { '/' });

                      string diaMenor = split_menor[0].ToString();
                      string mesMenor = split_menor[1].ToString();
                      string anoMenor = split_menor[2].ToString();

                      data1_SQL = anoMenor + "-" + mesMenor + "-" + diaMenor;

                      string pesquisa2 = "select * from receita where Data like '" + data1_SQL + "'and ID_Usuario like'" + id_usuario + "' and valido like 's' ORDER BY Data ASC";
                      MySqlDataAdapter ad1 = new MySqlDataAdapter(pesquisa2, conexao);
                      ad1.SelectCommand.Parameters.AddWithValue("valor", dateTimePicker1.Text + "%");
                      DataTable table1 = new DataTable();
                      ad1.Fill(table1);
                      dataGridView1.DataSource = table1;
                      this.dataGridView1.Columns[0].Visible = false;
                      this.dataGridView1.Columns[1].Visible = false;
                      this.dataGridView1.Columns[6].Visible = false;
                      conexao.Close();
                      break;
              }
          }
      }
        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            textBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[4].Value);
            textBox2.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[5].Value);
            textBox3.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[0].Value);
            maskedTextBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[2].Value);
            comboBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[3].Value);

        }

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (comboBox2.Text == "Selecione")
            {
                dateTimePicker1.Visible = false;
                dateTimePicker2.Visible = false;
                label5.Visible = false;
                label6.Visible = false;
            }
            if (comboBox2.Text == "Data")
            {
                dateTimePicker1.Visible = true;
                dateTimePicker2.Visible = false;
                label6.Visible = false;
                label5.Visible = true;
            }
            else
            {
                label5.Visible = true;
                dateTimePicker2.Visible = true;
                label6.Visible = true;
            }
            }

        private void dateTimePicker1_ValueChanged(object sender, EventArgs e)
        {
            dataInicio_txt = dateTimePicker1.Value.Date.ToString("dd/MM/yyyy");
            dataInicio_SQL = dateTimePicker1.Value.Date.ToString("yyyy-MM-dd"); 

            label5.Text = dataInicio_txt;
        }

        private void dateTimePicker2_ValueChanged(object sender, EventArgs e)
        {
            dataFim_txt = dateTimePicker2.Value.Date.ToString("dd/MM/yyyy"); 
            dataFim_SQL = dateTimePicker2.Value.Date.ToString("yyyy-MM-dd"); 

            label6.Text = dataFim_txt; 
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

  
        }


    }

