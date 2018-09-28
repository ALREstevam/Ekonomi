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
    public partial class FrmSplash : Form
    {
        public FrmSplash()
        {
            InitializeComponent();
        }

        private void FrmSplash_Load(object sender, EventArgs e)
        {

        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            if (progressBar1.Value < 100)
            {
                progressBar1.Value = progressBar1.Value + 4;
                
            }
            else
            {
                timer1.Enabled = false;
                frm_menu frl = new frm_menu();
                frl.Show();
                this.Visible = false;

                
            }
        }

        private void progressBar1_Click(object sender, EventArgs e)
        {

        }

    }
}
