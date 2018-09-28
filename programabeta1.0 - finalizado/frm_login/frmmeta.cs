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
    public partial class frmmeta : Form
    {
        String id_usuario = Usuario.ID_Usuario;
        private MySqlConnection conexao;

        String datasql;

        public frmmeta()
        {
            InitializeComponent();
        }

        private void textBox4_TextChanged(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("Deseja limpar os campos?", "Excluir?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
            {

                textBox1.Clear();
                textBox4.Clear();
                textBox2.Clear();
                maskedTextBox1.Text = "";

            }
            else
            {

            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            maskedTextBox1.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
            if (textBox1.Text == "" || textBox4.Text == "" || maskedTextBox1.Text == "")
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
                dalMeta dalmeta = new dalMeta();
                mo.Data_Meta = Convert.ToDateTime(maskedTextBox1.Text);
                String n = Convert.ToString(textBox4.Text);
                mo.Valor_Meta = n.Replace(",", ".");
                mo.Nome_Meta = textBox1.Text;

                dalmeta.inserirMeta(mo);
                textBox2.Text = "";
                MessageBox.Show("Dados salvos com sucesso!", "Ekonomi",
                MessageBoxButtons.OK, MessageBoxIcon.Asterisk);

                textBox1.Text = "";
                maskedTextBox1.Text = "";
                textBox4.Text = "";
                textBox2.Text = "";
            }
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void monthCalendar1_DateChanged(object sender, DateRangeEventArgs e)
        {

        }

        private void button3_Click(object sender, EventArgs e)
        {
            maskedTextBox1.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
            if (textBox1.Text == "" || textBox4.Text == "" || maskedTextBox1.Text == "")
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
                dalMeta dalmeta = new dalMeta();
                mo.id_meta = Convert.ToInt16(textBox2.Text);
                mo.Nome_Meta = textBox1.Text;
                mo.Data_Meta = Convert.ToDateTime(maskedTextBox1.Text);
                String n = Convert.ToString(textBox4.Text);
                mo.Valor_Meta = n.Replace(",", ".");

                dalmeta.atualizar(mo);
                MessageBox.Show("Dados atualizados com sucesso!", "Ekonomi",
                MessageBoxButtons.OKCancel, MessageBoxIcon.Asterisk);

                textBox1.Text = "";
                maskedTextBox1.Text = "";
                textBox4.Text = "";
                textBox2.Text = "";
            }

        }

        private void button4_Click(object sender, EventArgs e)
        {
            if (textBox2.Text == "")
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
                        dalMeta dalmeta = new dalMeta();
                        mo.id_meta = Convert.ToInt16(textBox2.Text);
                        dalmeta.deletar(mo);
                        MessageBox.Show("Dados removidos com sucesso!", "Ekonomi",
                        MessageBoxButtons.OKCancel, MessageBoxIcon.Asterisk);
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
            textBox4.Clear();
            maskedTextBox1.Text = "";

        }

        private void button5_Click(object sender, EventArgs e)
        {


            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            conexao = new MySqlConnection(caminhodb);
            conexao.Open();

            //Trim().Replace("/", string.Empty) == string.Empty)
            if (maskedTextBox2.Text == "")
            {
                maskedTextBox2.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
                string pesquisa = "select * from meta where metas like @valor and ID_Usuario like'" +id_usuario +"' and valido like 's' ";
                MySqlDataAdapter ad = new MySqlDataAdapter(pesquisa, conexao);
                ad.SelectCommand.Parameters.AddWithValue("valor", maskedTextBox2.Text + "%");
                DataTable table = new DataTable();
                ad.Fill(table);
                dataGridView1.DataSource = table;
                this.dataGridView1.Columns[0].Visible = false;
                this.dataGridView1.Columns[1].Visible = false;
                this.dataGridView1.Columns[5].Visible = false;
                conexao.Close();
            }

            else
            {
                //segunda parte//
                string[] split_q = maskedTextBox2.Text.Split(new Char[] { '/' });


                string dia = split_q[0].ToString();
                string mes = split_q[1].ToString();
                string ano = split_q[2].ToString();

                datasql = ano + "-" + mes + "-" + dia;

                string pesquisa1 = "select * from meta where data like'" + datasql + "'and ID_Usuario like'" +id_usuario+ "'and valido like 's' order by data ASC";
                MySqlDataAdapter ad1 = new MySqlDataAdapter(pesquisa1, conexao);
                ad1.SelectCommand.Parameters.AddWithValue("valor", maskedTextBox2.Text + "%");
                DataTable table1 = new DataTable();
                ad1.Fill(table1);
                dataGridView1.DataSource = table1;
                this.dataGridView1.Columns[0].Visible = false;
                this.dataGridView1.Columns[1].Visible = false;
                this.dataGridView1.Columns[5].Visible = false;
                conexao.Close();
            }
        }

        private void dataGridView1_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            maskedTextBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[3].Value);
            textBox1.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[2].Value);
            textBox2.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[0].Value);
            textBox4.Text = Convert.ToString(dataGridView1.CurrentRow.Cells[4].Value);
        }

        private void maskedTextBox2_MaskInputRejected(object sender, MaskInputRejectedEventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }
    }
}


