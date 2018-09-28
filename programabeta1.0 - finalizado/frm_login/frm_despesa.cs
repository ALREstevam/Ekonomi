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
    public partial class frm_despesa : Form
    {
        String id_usuario = Usuario.ID_Usuario;

        public MySqlConnection conexao = new MySqlConnection();
        public int contador;

         String dataInicio_txt, dataFim_txt, dataInicio_SQL, dataFim_SQL;
        //OBS: TXT = formato normal 12/34/5678   
        // SQL = formato do sql

        String EsseMes, EsseAno, data1_SQL, data2_SQL;
        DateTime ultimoDiaDoMes;

        public static string global;
        public frm_despesa()
        {

            InitializeComponent();

            comboBox4.Visible = false;
            comboBox6.Visible = false;

            DateTime now = DateTime.Now; //PEGA A DATA DE HOJE
            monthCalendar1.TodayDate = DateTime.Now; //SETA A DATA DO MONTHCALENDAR PARA A DATA DE HOJE

            DateTime dtfrom = DateTime.Now;  //COLOCA COISAS EM FORMATO CORRETO OU ALGO ASSIM

            EsseMes = now.ToString("MM");
            EsseAno = now.ToString("yyyy");

            String primDia = "01/" + EsseMes + "/" + EsseAno; //CONFIGURA A DATA DO PRIMEIRO DIA DO MÊS ATUAL


            label8.Text = primDia; //ESCREVE ESSA DATA NO LABEL


            data1_SQL = EsseAno + "-" + EsseMes + "-01"; //PASSA A DATA PARA O FORMATO ACEITO NO SQL

             /* CÓDIGO PARA PEGAR O ÚLTIMO DIA DO MES*/
            DateTime hoje_dia = monthCalendar1.SelectionStart;//PEGA A DATA JÁ MARCADA NO MONTH CALENDAR
            DateTime primeiroDiaDoMes = new DateTime(hoje_dia.Year, hoje_dia.Month, 01);//CRIA UM DATETIME COM O PRIMEIRO DIA DO MÊS ATUAL EX: 2015-10-01


            DateTime primeiroDiaDoProximoMes = primeiroDiaDoMes.AddMonths(1);//SOMA 1 MES NO PRIMEIRO DIA DESSE MÊS, FICANDO COM O PRIMEIRO DIA DO PRÓXIMO MÊS 2015-11-01

            //ESTANDO NO PRIMEIRO DIA DO PRÓXIMO MÊS ENTÃO É SÓ TIRAR 1 DIA QUE O ÚLTIMO DIA DO MÊS ATUAL VAI APARECER
            ultimoDiaDoMes = primeiroDiaDoProximoMes.AddDays(-1);

            label9.Text = ultimoDiaDoMes.ToShortDateString();//SETA A LABEL COM O ÚLTIMO DIA DO MÊS ATUAL

        }

        private void comboBox5_DropDownClosed(object sender, EventArgs e)
        {
            // String valcbb5
          
            if (comboBox5.SelectedItem.ToString() == "Despesa fixa")
            {
                comboBox4.Visible = true;
                comboBox6.Visible = true;
                comboBox6.Text = "";
                comboBox4.Text = "";
                comboBox6.Items.Clear();
                comboBox4.Items.Clear();
                comboBox6.Items.Add("Habitação");
                comboBox6.Items.Add("Transporte");
                comboBox6.Items.Add("Saúde");
                comboBox6.Items.Add("Educação");
                comboBox6.Items.Add("Impostos");
                comboBox6.Items.Add("Outros");

            }
            if (comboBox5.SelectedItem.ToString() == "Despesa variável")
            {
                comboBox4.Visible = true;
                comboBox6.Visible = true;
                comboBox6.Text = "";
                comboBox4.Text = "";
                comboBox6.Items.Clear();
                comboBox4.Items.Clear();
                comboBox6.Items.Add("Habitação variavel");
                comboBox6.Items.Add("Transporte variavel");
                comboBox6.Items.Add("Saúde variavel");
                comboBox6.Items.Add("Cuidados pessoais");
            }
            if (comboBox5.SelectedItem.ToString() == "Despesa extra")
            {
                comboBox4.Visible = true;
                comboBox6.Visible = true;
                comboBox6.Text = "";
                comboBox4.Text = "";
                comboBox6.Items.Clear();
                comboBox4.Items.Clear();
                comboBox6.Items.Add("Saúde extra");
                comboBox6.Items.Add("Manutenção/prevenção");
                comboBox6.Items.Add("Educação extra");
            }
            if (comboBox5.SelectedItem.ToString() == "Despesa adicional")
            {
                comboBox4.Visible = true;
                comboBox6.Visible = true;
                comboBox6.Text = "";
                comboBox4.Text = "";
                comboBox6.Items.Clear();
                comboBox4.Items.Clear();
                comboBox6.Items.Add("Lazer");
                comboBox6.Items.Add("Vestuário");
                comboBox6.Items.Add("Outros adicionais");
            }


        }

        private void comboBox6_DropDownClosed(object sender, EventArgs e)
        {

                if (comboBox6.SelectedItem.ToString() == "Habitação")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Aluguel");
                    comboBox4.Items.Add("Condominio");
                    comboBox4.Items.Add("Prestação da casa");
                    comboBox4.Items.Add("Seguro da casa");
                    comboBox4.Items.Add("Diarista");
                    comboBox4.Items.Add("Mensalista");


                }

                else if (comboBox6.SelectedItem.ToString() == "Transporte")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Prestação do carro");
                    comboBox4.Items.Add("Seguro do carro");
                    comboBox4.Items.Add("Estacionamento");
                }
                else if (comboBox6.SelectedItem.ToString() == "Saúde")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Seguro saude");
                    comboBox4.Items.Add("Plano de saúde");
                }
                else if (comboBox6.SelectedItem.ToString() == "Educação")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Colégio");
                    comboBox4.Items.Add("Faculdade");
                    comboBox4.Items.Add("Curso");
                }
                else if (comboBox6.SelectedItem.ToString() == "Impostos")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("IPTU");
                    comboBox4.Items.Add("IPVA");
                    comboBox4.Items.Add("Outros");
                }
                else if (comboBox6.SelectedItem.ToString() == "Outros")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Seguro de vida");
                }


                else if (comboBox6.SelectedItem.ToString() == "Habitação variavel")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Luz");
                    comboBox4.Items.Add("Água");
                    comboBox4.Items.Add("Telefone");
                    comboBox4.Items.Add("Telefone celular");
                    comboBox4.Items.Add("Gás");
                    comboBox4.Items.Add("Mensalidade TV");
                    comboBox4.Items.Add("Internet");
                }
                else if (comboBox6.SelectedItem.ToString() == "Transporte variavel")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Metrô");
                    comboBox4.Items.Add("Ônibus");
                    comboBox4.Items.Add("Combustivel");
                    comboBox4.Items.Add("Estacionamento");

                }
                else if (comboBox6.SelectedItem.ToString() == "Alimentação variavel")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Supermercado");
                    comboBox4.Items.Add("Feira");
                    comboBox4.Items.Add("Padaria");
                }
                else if (comboBox6.SelectedItem.ToString() == "Saúde variavel")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Medicamentos");
                }
                else if (comboBox6.SelectedItem.ToString() == "Cuidados pessoais")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Cabeleireiro");
                    comboBox4.Items.Add("Manicure");
                    comboBox4.Items.Add("Esteticista");
                    comboBox4.Items.Add("Academia");
                    comboBox4.Items.Add("Clube");

                }
                else if (comboBox6.SelectedItem.ToString() == "Saúde extra")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Médico");
                    comboBox4.Items.Add("Dentista");
                    comboBox4.Items.Add("Hospital");

                }
                else if (comboBox6.SelectedItem.ToString() == "Manutenção/prevenção")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Carro");
                    comboBox4.Items.Add("Casa");

                }
                else if (comboBox6.SelectedItem.ToString() == "Educação extra")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Material escolar");
                    comboBox4.Items.Add("Uniforme");
                }
                else if (comboBox6.SelectedItem.ToString() == "Lazer")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Viagens");
                    comboBox4.Items.Add("Cinema / Teatro");
                    comboBox4.Items.Add("Restaurantes / Bares");
                    comboBox4.Items.Add("Locadora DVD");
                }
                else if (comboBox6.SelectedItem.ToString() == "Vestuário")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Roupas");
                    comboBox4.Items.Add("Calçados");
                    comboBox4.Items.Add("Acessórios");
                }
                else if (comboBox6.SelectedItem.ToString() == "Outros adicionais")
                {
                    comboBox4.Text = "";
                    comboBox4.Items.Clear();
                    comboBox4.Items.Add("Presentes");
                }

                else
                {
                    comboBox4.Items.Clear();
                }


            }
        
                

        private void button1_Click(object sender, EventArgs e)
        {
            
            maskedTextBox1.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
            if (comboBox6.Text == "" || comboBox4.Text == "" ||  comboBox5.Text == "Despesa" || textBox1.Text == "" || textBox6.Text == "" || textBox2.Text == "" || maskedTextBox1.Text == "")
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
                dal da = new dal();
                //mo.n_parcelas = Convert.ToInt16(textBox2.Text);
                mo.despesa = comboBox5.Text;
                mo.categoria = comboBox6.Text;
                mo.tipo = comboBox4.Text;
                String n = Convert.ToString(textBox1.Text);
                mo.valor = n.Replace(",", ".");
                mo.data = Convert.ToDateTime(maskedTextBox1.Text);
                mo.desc = textBox6.Text;
                da.cadastro(mo);


                if (textBox2.Text == "0")
                {
                    String total = textBox1.Text;


                    if (textBox2.Text != "" && maskedTextBox1.Text != "")
                    {
                        DateTime datavenc = Convert.ToDateTime(maskedTextBox1.Text);
                        DateTime hoje = DateTime.Now;

                        int parcela = Convert.ToInt16(textBox2.Text);


                        for (int i = 0; i <= parcela; i++)
                        {
                            DateTime data_futura = datavenc.AddMonths(i);
                            dataGridView1.Rows.Add(i, data_futura, total);
                        }
                    }
                    else
                    {
                        MessageBox.Show("Informe o número e a data da parcela.",
               "Aviso!",
               MessageBoxButtons.OK,
               MessageBoxIcon.Exclamation,
               MessageBoxDefaultButton.Button1);
                    }


                    String resultado;//gravar numero do id
                    String caminhobd = "Server=127.0.0.1;DATABASE=tcc;UID=root ;PASSWORD=";
                    MySqlConnection cn2 = new MySqlConnection(caminhobd);
                    MySqlCommand cmd = new MySqlCommand("SELECT max(Id_despesa) from despesas", cn2);//pesquisa o ultimo numero criado
                    cn2.Open();
                    MySqlDataReader reader = cmd.ExecuteReader();

                    if (reader.Read())
                    {
                        resultado = reader.GetString(0);
                        textBox4.Text = resultado;
                    }
                    //fim pesquisa id emprestimo

                    ////gravar itens do empréstimo
                    contador = Convert.ToInt16(textBox2.Text);
                    string[,] item = new string[1, 4];
                    for (int x = 0; x < 1; x++)//linha
                    {

                        for (int y = 0; y < 4; y++)//coluna
                        {
                            DataGridViewCell cell = null;//instancia o objeto
                            foreach (DataGridViewCell selectedCell in dataGridView1.SelectedCells)//verifica se existe dados
                            {
                                cell = selectedCell;//armazena a quantidade de celulas
                                break;
                            }
                            if (cell != null)//se diferente de null
                            {

                                if (y == 0)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    mo.n_parcelas = Convert.ToInt16(item[x, y]);
                                }
                                else if (y == 1)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    mo.data_parc = Convert.ToDateTime(item[x, y]);
                                }
                                else if (y == 2)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    String oe = Convert.ToString(item[x, y]);
                                    mo.valor_parc = oe.Replace(",", ".");
                                }
                                if (y == 3)
                                {
                                    mo.id_despesa = Convert.ToInt16(textBox4.Text);
                                }
                            }
                        }
                        da.parcela_desp(mo);
                    }


                }


                else
                {
                    String resultado;//gravar numero do id
                    String caminhobd = "Server=127.0.0.1;DATABASE=tcc;UID=root ;PASSWORD=";
                    MySqlConnection cn2 = new MySqlConnection(caminhobd);
                    MySqlCommand cmd = new MySqlCommand("SELECT max(Id_despesa) from despesas", cn2);//pesquisa o ultimo numero criado
                    cn2.Open();
                    MySqlDataReader reader = cmd.ExecuteReader();

                    if (reader.Read())
                    {
                        resultado = reader.GetString(0);
                        textBox4.Text = resultado;
                    }
                    //fim pesquisa id emprestimo

                    ////gravar itens do empréstimo
                    contador = Convert.ToInt16(textBox2.Text);
                    string[,] item = new string[contador, 4];
                    for (int x = 0; x < contador; x++)//linha
                    {
                        for (int y = 0; y < 4; y++)//coluna
                        {
                            DataGridViewCell cell = null;//instancia o objeto
                            foreach (DataGridViewCell selectedCell in dataGridView1.SelectedCells)//verifica se existe dados
                            {
                                cell = selectedCell;//armazena a quantidade de celulas
                                break;
                            }
                            if (cell != null)//se diferente de null
                            {

                                if (y == 0)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    mo.n_parcelas = Convert.ToInt16(item[x, y]);
                                }
                                else if (y == 1)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    mo.data_parc = Convert.ToDateTime(item[x, y]);
                                }
                                else if (y == 2)
                                {
                                    item[x, y] = dataGridView1.Rows[x].Cells[y].Value.ToString();
                                    String oe = Convert.ToString(item[x, y]);
                                    mo.valor_parc = oe.Replace(",", ".");
                                }
                                if (y == 3)
                                {
                                    mo.id_despesa = Convert.ToInt16(textBox4.Text);
                                }
                            }
                        }
                        da.parcela_desp(mo);

                    }
                }




                dataGridView1.Rows.Clear();
                textBox4.Text = "";
                comboBox4.Text = "Tipo";
                comboBox5.Text = "Despesa";
                comboBox6.Text = "Categoria";
                textBox1.Text = "";
                maskedTextBox1.Text = "";
                textBox6.Text = "";
                textBox2.Text = "0";
                dataGridView1.DataSource = null;
                MessageBox.Show("Dados salvos com sucesso!", "Ekonomi", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);



            }
            
        }

        private void button6_Click(object sender, EventArgs e)
        {



            String caminhodb = "Server= 127.0.0.1; DATABASE= tcc; UID= root; PASSWORD=  ";

            conexao = new MySqlConnection(caminhodb);
            conexao.Open();


            String op = (String)comboBox7.SelectedItem;


            switch (op)
            {
                case "Parcelas":

                    string[] split_menor = label8.Text.Split(new Char[] { '/' });

                    string diaMenor = split_menor[0].ToString();
                    string mesMenor = split_menor[1].ToString();
                    string anoMenor = split_menor[2].ToString();

                    data1_SQL = anoMenor + "-" + mesMenor + "-" + diaMenor;

                    string[] split_maior = label9.Text.Split(new Char[] { '/' });

                    //string correctString = resultado.Replace("-",", "); //ISSO NÃO FUNCIONOU
                    string diaMaior = split_maior[0].ToString();
                    string mesMaior = split_maior[1].ToString();
                    string anoMaior = split_maior[2].ToString();

                    data2_SQL = anoMaior + "-" + mesMaior + "-" + diaMaior;

                    string pesquisa2 = "select * from despesas INNER JOIN parcela ON parcela.Id_despesa = despesas.Id_despesa where valido like 's' and Data_parcela BETWEEN '" + data1_SQL + "'and'" + data2_SQL + "'and ID_Usuario like'" + id_usuario +"' ORDER BY Data_parcela";
                    MySqlDataAdapter ad1 = new MySqlDataAdapter(pesquisa2, conexao);
                    ad1.SelectCommand.Parameters.AddWithValue("valor", label8.Text + "%");
                    DataTable table1 = new DataTable();
                    ad1.Fill(table1);
                    dataGridView2.DataSource = table1;
                    this.dataGridView2.Columns[0].Visible = false;
                    this.dataGridView2.Columns[1].Visible = false;
                    this.dataGridView2.Columns[8].Visible = false;
                    this.dataGridView2.Columns[9].Visible = false;
                    this.dataGridView2.Columns[10].Visible = false;
                    conexao.Close();
                    break;

               
                case "Total":

                    string[] split_menor2 = label8.Text.Split(new Char[] { '/' }); 

                    string diaMenor2 = split_menor2[0].ToString();
                    string mesMenor2 = split_menor2[1].ToString();  
                    string anoMenor2 = split_menor2[2].ToString();

                    data1_SQL = anoMenor2 + "-" + mesMenor2 + "-" + diaMenor2;


                    string pesquisa3 = "select * from despesas where valido like 's' and Data like '" + data1_SQL + "'and ID_Usuario like'" + id_usuario + "' ORDER BY Data";
                    MySqlDataAdapter ad3 = new MySqlDataAdapter(pesquisa3, conexao);
                    ad3.SelectCommand.Parameters.AddWithValue("valor", label8.Text + "%");
                    DataTable table3 = new DataTable();
                    ad3.Fill(table3);
                    dataGridView2.DataSource = table3;
                    this.dataGridView2.Columns[0].Visible = false;
                    this.dataGridView2.Columns[1].Visible = false;
                    this.dataGridView2.Columns[8].Visible = false;
                    conexao.Close();
                    break;


            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            if (textBox4.Text == "")
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
                        maskedTextBox1.TextMaskFormat = MaskFormat.IncludePromptAndLiterals;
                        construtor mo = new construtor();
                        dal da = new dal();
                        mo.id_despesa = Convert.ToInt16(textBox4.Text);
                        //mo.id_parcela = Convert.ToInt16(textBox7.Text);
                        da.deleta(mo);
                        //da.deleta_parc(mo);
                        MessageBox.Show("Dados excluidos com sucesso!", "Ekonomi", MessageBoxButtons.OK, MessageBoxIcon.Asterisk);
                        limpar();
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

        private void button2_Click(object sender, EventArgs e)
        {
            
            if
                (MessageBox.Show(("Deseja limpar todos os campos?"), "Excluir?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
            {
                comboBox4.Text = "Tipo";
                comboBox5.Text = "Despesa";
                comboBox6.Text = "Categoria";
                textBox1.Text = "";
                maskedTextBox1.Text = "";
                textBox6.Text = "";
                textBox2.Text = "";
                dataGridView1.Rows.Clear();
            }

            else
            {

            }
        }

        private void dataGridView2_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            comboBox5.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[2].Value);
            comboBox6.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[6].Value);
            comboBox4.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[3].Value);
            textBox1.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[4].Value);
            maskedTextBox1.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[5].Value);
            textBox6.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[7].Value);
            textBox4.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[0].Value);
            //textBox7.Text = Convert.ToString(dataGridView2.CurrentRow.Cells[10].Value);
        }
        



        private void limpar()
        {
            comboBox4.Text = "Tipo";
            comboBox5.Text = "Despesa";
            comboBox6.Text = "Categoria";
            textBox1.Clear();
            maskedTextBox1.Clear();
            textBox4.Clear();
            textBox6.Clear();
            textBox2.Clear();

        }

        private void button3_Click(object sender, EventArgs e)
        { 
           
                String total = textBox1.Text;
                maskedTextBox1.TextMaskFormat = MaskFormat.ExcludePromptAndLiterals;
            if (textBox1.Text == "" || maskedTextBox1.Text == "")
            {
                MessageBox.Show("Complete os campos Valor e Data.",
                "Aviso!",
                MessageBoxButtons.OK,
                MessageBoxIcon.Exclamation,
                MessageBoxDefaultButton.Button1);
            }
            else
            {

                float parc = float.Parse(total) / float.Parse(textBox2.Text);
                if (textBox2.Text != "" && maskedTextBox1.Text != "")
                {
                    maskedTextBox1.TextMaskFormat = MaskFormat.IncludePromptAndLiterals;
                    DateTime datavenc = Convert.ToDateTime(maskedTextBox1.Text);
                    DateTime hoje = DateTime.Now;

                    int parcela = Convert.ToInt16(textBox2.Text);


                    for (int i = 1; i <= parcela; i++)
                    {
                        DateTime data_futura = datavenc.AddMonths(i);
                        dataGridView1.Rows.Add(i, data_futura,parc);
                    }
                }
                else
                {
                    MessageBox.Show("Informe o numero ou a data da parcela");
                }
            }
            }
        

        private void dateTimePicker_inicio_ValueChanged(object sender, EventArgs e)
        {
             dataInicio_txt = dateTimePicker_inicio.Value.Date.ToString("dd/MM/yyyy"); //PEGA O VALOR DO DATETIMEPICKER E COLOCA NO FORMATO NORMAL
            dataInicio_SQL = dateTimePicker_inicio.Value.Date.ToString("yyyy-MM-dd"); //PEGA O VALOR DO DATETIMEPICKER E COLOCA NO FORMATO SQL

            label8.Text = dataInicio_txt; //BOTA A DATA INICIAL NO LABEL CORRESPONDENTE
        }

        private void dateTimePicker2_ValueChanged(object sender, EventArgs e)
        {
             dataFim_txt = dateTimePicker_fim.Value.Date.ToString("dd/MM/yyyy"); //PEGA O VALOR DO DATETIMEPICKER E COLOCA NO FORMATO NORMAL
            dataFim_SQL = dateTimePicker_fim.Value.Date.ToString("yyyy-MM-dd"); //PEGA O VALOR DO DATETIMEPICKER E COLOCA NO FORMATO SQL

            label9.Text = dataFim_txt; //BOTA A DATA FINAL NO LABEL CORRESPONDENTE
        }

        private void comboBox7_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (comboBox7.Text == "Parcelas")
            {
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                dateTimePicker_fim.Visible = true;
                dateTimePicker_inicio.Visible = true;
            }
            else if (comboBox7.Text == "Mês")
            {
                label7.Visible = true;
                label8.Visible = true;
                label9.Visible = true;
                dateTimePicker_fim.Visible = true;
                dateTimePicker_inicio.Visible = true;
            }
            else
            {
                label8.Visible = true;
                dateTimePicker_inicio.Visible = true;
                label9.Visible = false;
                dateTimePicker_fim.Visible = false;
                label7.Visible = false;
            }
        }

        private void tabPage1_Click(object sender, EventArgs e)
        {

        }






        //public decimal ajustarnumero(string numero)
        //{
        //    string novonumero = "";
        //    char[] arr = numero.ToCharArray();
        //    foreach(char item in arr)
        //    {
        //        if(item.ToString() != ",")
        //        {
        //            novonumero += item.ToString();
        //        }
        //        else if (item.ToString() == ",")
        //        {
        //            novonumero += ",";
        //        }
        //    }
        //    decimal retorno = Decimal.Round(Convert.ToDecimal(novonumero), 2);
        //    return retorno;
        //}

    }
    }



