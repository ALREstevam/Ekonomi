using Form_Calendario;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Diagnostics;

namespace frm_login
{
    public partial class frm_menu : Form
    {
        String Nome_1 = Usuario.Nome;
        String Email_1 = Usuario.Email;
        String id_1 = Usuario.ID_Usuario;
        String senha_1 = Usuario.Senha;

        public frm_menu()
        {
            InitializeComponent();

            String endereco = "http://localhost/ekonomi/cshaplogin/receiver.php?login=" + Email_1 + "&senha=" + senha_1 + "";
            //Envia o login e senha do usuário pelo método _GET

            Uri link_uri = new Uri(endereco);        //Instanciar o endereço como formato link
            webControl2.Source = link_uri;
        }

        private void sairToolStripMenuItem_Click(object sender, EventArgs e)
        {
            if (MessageBox.Show("Deseja sair do programa?", "Sair?", MessageBoxButtons.OKCancel, MessageBoxIcon.Question) == DialogResult.OK)
            {
                Application.Exit();
            }
            else
            {

            }
        }

        private void logoffToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Hide();
            login login = new login();
            login.ShowDialog();
        }

        private void adicionarDespesaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frm_despesa desp = new frm_despesa ();
            desp.Show();
        }

        private void adicionarReceitaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frm_receita rec = new frm_receita();
            rec.Show();
        }

        private void calculadoraToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Calculadora_1 calc = new Calculadora_1();
            calc.Show();
        }

        private void adicionarInvestimentosToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frm_investimento investimento = new frm_investimento();
            investimento.Show();
        }

        private void adicionarMetaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmmeta meta = new frmmeta();
            meta.Show();
        }

        private void comoFuncionaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            FrmFunciona funciona = new FrmFunciona();
            funciona.Show();
        }

        private void oQueÉToolStripMenuItem_Click(object sender, EventArgs e)
        {
            FrmQue oq = new FrmQue();
            oq.Show();
        }

        private void estadoDaReceitaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Form2 estadorec = new Form2();
            estadorec.Show();
        }

        private void frm_menu_Load(object sender, EventArgs e)
        {

            label1.Text = Nome_1;
            label2.Text = Email_1;


            String Foto = Usuario.Foto;

            escondeFotos();


            if (Foto == "imagens/users1.png") { pictureBox1_users1.Show(); }
            else if (Foto == "imagens/users2.png") { pictureBox10_users10.Show(); }
            else if (Foto == "imagens/users3.png") { pictureBox3_users3.Show(); }
            else if (Foto == "imagens/users7.png") { pictureBox7_users7.Show(); }
            else if (Foto == "imagens/users4.png") { pictureBox4_users4.Show(); }
            else if (Foto == "imagens/users5.png") { pictureBox5_users5.Show(); }
            else if (Foto == "imagens/users8.png") { pictureBox8_users8.Show(); }
            else if (Foto == "imagens/users9.png") { pictureBox9_users9.Show(); }
            else if (Foto == "imagens/users10.png") { pictureBox10_users10.Show(); }

                 else 
                 {
                     pictureBox1_users1.Show();
                 }





        }

        public void escondeFotos(){
            pictureBox1_users1.Hide();
            pictureBox2_users2.Hide();
            pictureBox8_users8.Hide();
            pictureBox4_users4.Hide();
            pictureBox7_users7.Hide();
            pictureBox5_users5.Hide();
            pictureBox3_users3.Hide();
            pictureBox10_users10.Hide();
            pictureBox9_users9.Hide();

            pictureBox1_users1.Hide();

        }

        private void opçõesToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {

            Application.Exit();

            /*
              
             Process[] processes = Process.GetProcessesByName("frm_login.exe");
            foreach(Process process in processes){
                process.Kill();
            }

             */
      
            
            
            
            
            
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Minimized;
        }

        private void pictureBox4_Click(object sender, EventArgs e)  //RECARREGA O WEBCONTROL
        {
            String endereco = "http://localhost/ekonomi/cshaplogin/receiver.php?login=" + Email_1 + "&senha=" + senha_1 + "";
            //Envia o login e senha do usuário pelo método _GET

            Uri link_uri = new Uri(endereco);        //Instanciar o endereço como formato link
            webControl2.Source = link_uri;
        }

        private void adicionarNotaToolStripMenuItem_Click(object sender, EventArgs e)
        {
            notas notas = new notas();
            notas.Show();
        }
        
    
    
    }

      



   
    }

