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
    public partial class frm_investimento : Form
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;
        String dataInicio_txt, dataFim_txt, dataInicio_SQL, dataFim_SQL;
        String EsseMes, EsseAno, data1_SQL, data2_SQL;
        DateTime ultimoDiaDoMes;
       
        
        public frm_investimento()
        {
            InitializeComponent();

            DateTime now = DateTime.Now; 
            monthCalendar1.TodayDate = DateTime.Now; 

            DateTime dtfrom = DateTime.Now;  

            EsseMes = now.ToString("MM");
            EsseAno = now.ToString("yyyy");

            String primDia = "01/" + EsseMes + "/" + EsseAno;


            label5.Text = primDia; 


            data1_SQL = EsseAno + "-" + EsseMes + "-01"; 


            DateTime hoje_dia = monthCalendar1.SelectionStart;
            DateTime primeiroDiaDoMes = new DateTime(hoje_dia.Year, hoje_dia.Month, 01);


            DateTime primeiroDiaDoProximoMes = primeiroDiaDoMes.AddMonths(1);

            
            ultimoDiaDoMes = primeiroDiaDoProximoMes.AddDays(-1);

            label6.Text = ultimoDiaDoMes.ToShortDateString();
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
                dalinvestimento dali = new dalinvestimento();
                mo.tipoi = comboBox1.Text;
                mo.obs = textBox2.Text;
                String n = Convert.ToString(textBox1.Text);
                mo.valori = n.Replace(",", ".");
                mo.datai = Convert.ToDateTime(maskedTextBox1.Text);

                dali.inserir(mo);
                textBox3.Text = "";
                MessageBox.Show("Dados salvos com sucesso!", "Ekonomi",MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                apagar();
            }
        }

        private void button2_Click(object sender, EventArgs e)
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
                dalinvestimento dali = new dalinvestimento();
                mo.id_investimento = Convert.ToInt16(textBox3.Text);
                mo.tipoi = comboBox1.Text;
                mo.obs = textBox2.Text;
                String n = Convert.ToString(textBox1.Text);
                mo.valori = n.Replace(",", ".");
                mo.datai = Convert.ToDateTime(maskedTextBox1.Text);

                dali.sucesso(mo);
                MessageBox.Show("Dados atualizados com sucesso!", "Ekonomi",MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                apagar();

            }
        }

        private void button3_Click(object sender, EventArgs e)
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
                if (MessageBox.Show("Deseja excluir os dados?", "Excluir?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
                {
                    try
                    {
                        construtor mo = new construtor();
                        dalinvestimento dali = new dalinvestimento();
                        mo.id_investimento = Convert.ToInt16(textBox3.Text);
                        dali.deletar(mo);
                        MessageBox.Show("Dados excluidos com sucesso!", "Ekonomi",MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                        apagar();
                    }

                    catch (Exception ex)
                    {
                        throw new Exception("Não encontrado/digite um código existente" + ex.Message);
                    }
                }
                else
                {

                }
            }
        }
        private void apagar()
        {

            textBox1.Clear();
            textBox2.Clear();
            textBox3.Clear();
            comboBox1.Text = "";
            maskedTextBox1.Text = "";
             
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if

          (MessageBox.Show(("Deseja limpar os campos?"), "Limpar?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
            {
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
                comboBox1.Text = "";
                maskedTextBox1.Text = "";
            }
            else
            {

            }

        }

        private void button5_Click(object sender, EventArgs e)
        {
            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            conexao = new MySqlConnection(caminhodb);
            conexao.Open();
            String op = (String)comboBox2.SelectedItem;
            switch (op)
            {
                case "Data":

               string[] split_menor = label5.Text.Split(new Char[] { '/' });

                      string diaMenor = split_menor[0].ToString();
                      string mesMenor = split_menor[1].ToString();
                      string anoMenor = split_menor[2].ToString();

                      data1_SQL = anoMenor + "-" + mesMenor + "-" + diaMenor;

                    string pesquisa = "select * from investimento where Data like'" + data1_SQL + "'and ID_Usuario like'" + id_usuario + "'and valido like 's' order by Data ASC ";
                    MySqlDataAdapter ad = new MySqlDataAdapter(pesquisa, conexao);
                    ad.SelectCommand.Parameters.AddWithValue("valor", dateTimePicker1.Text + "%");
                    DataTable table = new DataTable();
                    ad.Fill(table);
                    dataGridView1.DataSource = table;
                    this.dataGridView1.Columns[0].Visible = false;
                    this.dataGridView1.Columns[1].Visible = false;
                    this.dataGridView1.Columns[6].Visible = false;
                    conexao.Close();
                    break;
                case "Mês":
                     string[] split_menor1 = label5.Text.Split(new Char[] { '/' }); 


                      string diaMenor1 = split_menor1[0].ToString();
                      string mesMenor1 = split_menor1[1].ToString();  
                      string anoMenor1 = split_menor1[2].ToString();

                      data1_SQL = anoMenor1 + "-" + mesMenor1 + "-" + diaMenor1;


                      string[] split_maior = label6.Text.Split(new Char[] { '/' });

                      string diaMaior = split_maior[0].ToString();
                      string mesMaior = split_maior[1].ToString();
                      string anoMaior = split_maior[2].ToString();

                      data2_SQL = anoMaior + "-" + mesMaior + "-" + diaMaior;


                      var pesquisa2 = "SELECT * FROM investimento WHERE Data BETWEEN '" + data1_SQL + "' AND '" + data2_SQL + "' and ID_Usuario like'" + id_usuario + "'and valido like 's' ORDER BY Data ASC";
                      


                    MySqlCommand comando = new MySqlCommand(pesquisa2, conexao);
                    MySqlDataAdapter ad2 = new MySqlDataAdapter(pesquisa2, conexao);
                    ad2.SelectCommand.Parameters.AddWithValue("valor", label5.Text + "%");
                    DataTable table2 = new DataTable();
                    ad2.Fill(table2);
                    dataGridView1.DataSource = table2;
                    this.dataGridView1.Columns[0].Visible = false;
                    this.dataGridView1.Columns[1].Visible = false;
                    this.dataGridView1.Columns[6].Visible = false;
                    conexao.Close();
                    break;
            }
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            comboBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[2].Value);
            maskedTextBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[4].Value);
            textBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[5].Value);
            textBox2.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[3].Value);
            textBox3.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[0].Value);

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

        private void comboBox2_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (comboBox2.Text == "Selecione")
            {
                dateTimePicker1.Visible = false;
                dateTimePicker2.Visible = false;
                label5.Visible = false;
                label6.Visible = false;
                label8.Visible = false;
            }
            if (comboBox2.Text == "Data")
            {
                dateTimePicker1.Visible = true;
                dateTimePicker2.Visible = false;
                label6.Visible = false;
                label5.Visible = true;
                label8.Visible = false;
            }
            else
            {
                label5.Visible = true;
                dateTimePicker2.Visible = true;
                label6.Visible = true;
                label8.Visible = true;
            }
        }

        private void maskedTextBox1_MaskInputRejected(object sender, MaskInputRejectedEventArgs e)
        {

        }
    }
}