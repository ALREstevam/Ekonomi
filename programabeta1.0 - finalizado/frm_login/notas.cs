using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace frm_login
{
    public partial class notas : Form
    {
        public notas()
        {
            InitializeComponent();


            String Nome_1 = Usuario.Nome;
            String Email_1 = Usuario.Email;
            String id_1 = Usuario.ID_Usuario;
            String senha_1 = Usuario.Senha;


            String endereco = "http://localhost/ekonomi/cshaplogin/receiver_notas.php?login=" + Email_1 + "&senha=" + senha_1 + "";
            //Envia o login e senha do usuário pelo método _GET

            Uri link_uri = new Uri(endereco);        //Instanciar o endereço como formato link
            webControl1.Source = link_uri;







        }
    }
}
