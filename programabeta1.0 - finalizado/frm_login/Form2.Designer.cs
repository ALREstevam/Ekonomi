namespace Form_Calendario
{
    partial class Form2
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.dateTimePicker1_dataInicio = new System.Windows.Forms.DateTimePicker();
            this.dateTimePicker2dataFim = new System.Windows.Forms.DateTimePicker();
            this.label1_data1 = new System.Windows.Forms.Label();
            this.label2_data2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.TabControl = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.listBox1_despesa = new System.Windows.Forms.ListBox();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.listBox2_receita = new System.Windows.Forms.ListBox();
            this.tabPage3 = new System.Windows.Forms.TabPage();
            this.listBox3_investimento = new System.Windows.Forms.ListBox();
            this.tab_metas = new System.Windows.Forms.TabPage();
            this.listBox4_metas = new System.Windows.Forms.ListBox();
            this.label2 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label4_despesa = new System.Windows.Forms.Label();
            this.label16 = new System.Windows.Forms.Label();
            this.label17_receita = new System.Windows.Forms.Label();
            this.label18 = new System.Windows.Forms.Label();
            this.label19_investimentos = new System.Windows.Forms.Label();
            this.label20 = new System.Windows.Forms.Label();
            this.label21_total_resultado = new System.Windows.Forms.Label();
            this.monthCalendar1 = new System.Windows.Forms.MonthCalendar();
            this.LabelSelectedF = new System.Windows.Forms.Label();
            this.label6_metas = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.button1_pesquisar = new System.Windows.Forms.Button();
            this.groupBox1.SuspendLayout();
            this.TabControl.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tabPage2.SuspendLayout();
            this.tabPage3.SuspendLayout();
            this.tab_metas.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // dateTimePicker1_dataInicio
            // 
            this.dateTimePicker1_dataInicio.Location = new System.Drawing.Point(9, 41);
            this.dateTimePicker1_dataInicio.Name = "dateTimePicker1_dataInicio";
            this.dateTimePicker1_dataInicio.Size = new System.Drawing.Size(216, 20);
            this.dateTimePicker1_dataInicio.TabIndex = 0;
            this.dateTimePicker1_dataInicio.ValueChanged += new System.EventHandler(this.dateTimePicker1_dataInicio_ValueChanged);
            // 
            // dateTimePicker2dataFim
            // 
            this.dateTimePicker2dataFim.Location = new System.Drawing.Point(244, 41);
            this.dateTimePicker2dataFim.Name = "dateTimePicker2dataFim";
            this.dateTimePicker2dataFim.Size = new System.Drawing.Size(227, 20);
            this.dateTimePicker2dataFim.TabIndex = 1;
            this.dateTimePicker2dataFim.ValueChanged += new System.EventHandler(this.dateTimePicker2dataFim_ValueChanged);
            // 
            // label1_data1
            // 
            this.label1_data1.AutoSize = true;
            this.label1_data1.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1_data1.Location = new System.Drawing.Point(42, 75);
            this.label1_data1.Name = "label1_data1";
            this.label1_data1.Size = new System.Drawing.Size(108, 25);
            this.label1_data1.TabIndex = 2;
            this.label1_data1.Text = "00/00/000";
            // 
            // label2_data2
            // 
            this.label2_data2.AutoSize = true;
            this.label2_data2.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2_data2.Location = new System.Drawing.Point(196, 79);
            this.label2_data2.Name = "label2_data2";
            this.label2_data2.Size = new System.Drawing.Size(120, 25);
            this.label2_data2.TabIndex = 3;
            this.label2_data2.Text = "00/00/0000";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(103, 49);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(134, 13);
            this.label1.TabIndex = 4;
            this.label1.Text = "Selecionando dados entre:";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(12, 25);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(149, 13);
            this.label4.TabIndex = 7;
            this.label4.Text = "selecionar dados iniciando em";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(241, 25);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(83, 13);
            this.label5.TabIndex = 8;
            this.label5.Text = "e finalizando em";
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.label5);
            this.groupBox1.Controls.Add(this.dateTimePicker1_dataInicio);
            this.groupBox1.Controls.Add(this.label4);
            this.groupBox1.Controls.Add(this.dateTimePicker2dataFim);
            this.groupBox1.Location = new System.Drawing.Point(12, 119);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(510, 76);
            this.groupBox1.TabIndex = 9;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Faça sua seleção para pesquisa";
            // 
            // TabControl
            // 
            this.TabControl.Controls.Add(this.tabPage1);
            this.TabControl.Controls.Add(this.tabPage2);
            this.TabControl.Controls.Add(this.tabPage3);
            this.TabControl.Controls.Add(this.tab_metas);
            this.TabControl.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.TabControl.Location = new System.Drawing.Point(15, 230);
            this.TabControl.Name = "TabControl";
            this.TabControl.SelectedIndex = 0;
            this.TabControl.Size = new System.Drawing.Size(435, 286);
            this.TabControl.TabIndex = 10;
            this.TabControl.SelectedIndexChanged += new System.EventHandler(this.TabControl_SelectedIndexChanged);
            // 
            // tabPage1
            // 
            this.tabPage1.Controls.Add(this.listBox1_despesa);
            this.tabPage1.Location = new System.Drawing.Point(4, 22);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(427, 260);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Despesa";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // listBox1_despesa
            // 
            this.listBox1_despesa.AllowDrop = true;
            this.listBox1_despesa.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.listBox1_despesa.Font = new System.Drawing.Font("Microsoft Sans Serif", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox1_despesa.FormattingEnabled = true;
            this.listBox1_despesa.ItemHeight = 15;
            this.listBox1_despesa.Location = new System.Drawing.Point(0, 1);
            this.listBox1_despesa.Name = "listBox1_despesa";
            this.listBox1_despesa.ScrollAlwaysVisible = true;
            this.listBox1_despesa.Size = new System.Drawing.Size(424, 255);
            this.listBox1_despesa.TabIndex = 0;
            this.listBox1_despesa.SelectedIndexChanged += new System.EventHandler(this.listBox1_despesa_SelectedIndexChanged);
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.listBox2_receita);
            this.tabPage2.Location = new System.Drawing.Point(4, 22);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(427, 260);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Receita";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // listBox2_receita
            // 
            this.listBox2_receita.AllowDrop = true;
            this.listBox2_receita.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.listBox2_receita.Font = new System.Drawing.Font("Microsoft Sans Serif", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox2_receita.FormattingEnabled = true;
            this.listBox2_receita.ItemHeight = 15;
            this.listBox2_receita.Location = new System.Drawing.Point(6, 1);
            this.listBox2_receita.Name = "listBox2_receita";
            this.listBox2_receita.ScrollAlwaysVisible = true;
            this.listBox2_receita.Size = new System.Drawing.Size(418, 255);
            this.listBox2_receita.TabIndex = 2;
            this.listBox2_receita.SelectedIndexChanged += new System.EventHandler(this.listBox2_receita_SelectedIndexChanged);
            // 
            // tabPage3
            // 
            this.tabPage3.Controls.Add(this.listBox3_investimento);
            this.tabPage3.Location = new System.Drawing.Point(4, 22);
            this.tabPage3.Name = "tabPage3";
            this.tabPage3.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage3.Size = new System.Drawing.Size(427, 260);
            this.tabPage3.TabIndex = 2;
            this.tabPage3.Text = "Investimento";
            this.tabPage3.UseVisualStyleBackColor = true;
            // 
            // listBox3_investimento
            // 
            this.listBox3_investimento.AllowDrop = true;
            this.listBox3_investimento.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.listBox3_investimento.Font = new System.Drawing.Font("Microsoft Sans Serif", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox3_investimento.FormattingEnabled = true;
            this.listBox3_investimento.ItemHeight = 15;
            this.listBox3_investimento.Location = new System.Drawing.Point(6, 1);
            this.listBox3_investimento.Name = "listBox3_investimento";
            this.listBox3_investimento.ScrollAlwaysVisible = true;
            this.listBox3_investimento.Size = new System.Drawing.Size(421, 255);
            this.listBox3_investimento.TabIndex = 1;
            this.listBox3_investimento.SelectedIndexChanged += new System.EventHandler(this.listBox3_investimento_SelectedIndexChanged);
            // 
            // tab_metas
            // 
            this.tab_metas.Controls.Add(this.listBox4_metas);
            this.tab_metas.Location = new System.Drawing.Point(4, 22);
            this.tab_metas.Name = "tab_metas";
            this.tab_metas.Padding = new System.Windows.Forms.Padding(3);
            this.tab_metas.Size = new System.Drawing.Size(427, 260);
            this.tab_metas.TabIndex = 3;
            this.tab_metas.Text = "Metas";
            this.tab_metas.UseVisualStyleBackColor = true;
            // 
            // listBox4_metas
            // 
            this.listBox4_metas.AllowDrop = true;
            this.listBox4_metas.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.listBox4_metas.Font = new System.Drawing.Font("Microsoft Sans Serif", 9F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.listBox4_metas.FormattingEnabled = true;
            this.listBox4_metas.ItemHeight = 15;
            this.listBox4_metas.Location = new System.Drawing.Point(6, 1);
            this.listBox4_metas.Name = "listBox4_metas";
            this.listBox4_metas.ScrollAlwaysVisible = true;
            this.listBox4_metas.Size = new System.Drawing.Size(421, 255);
            this.listBox4_metas.TabIndex = 2;
            this.listBox4_metas.SelectedIndexChanged += new System.EventHandler(this.listBox4_metas_SelectedIndexChanged);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label2.Location = new System.Drawing.Point(462, 252);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(40, 13);
            this.label2.TabIndex = 11;
            this.label2.Text = "Total:";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(466, 282);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(116, 13);
            this.label3.TabIndex = 12;
            this.label3.Text = "Despesas            R$    ";
            // 
            // label4_despesa
            // 
            this.label4_despesa.AutoSize = true;
            this.label4_despesa.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label4_despesa.Location = new System.Drawing.Point(576, 280);
            this.label4_despesa.Name = "label4_despesa";
            this.label4_despesa.Size = new System.Drawing.Size(32, 13);
            this.label4_despesa.TabIndex = 13;
            this.label4_despesa.Text = "0,00";
            // 
            // label16
            // 
            this.label16.AutoSize = true;
            this.label16.Location = new System.Drawing.Point(466, 306);
            this.label16.Name = "label16";
            this.label16.Size = new System.Drawing.Size(109, 13);
            this.label16.TabIndex = 14;
            this.label16.Text = "Receita                R$ ";
            // 
            // label17_receita
            // 
            this.label17_receita.AutoSize = true;
            this.label17_receita.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label17_receita.Location = new System.Drawing.Point(576, 306);
            this.label17_receita.Name = "label17_receita";
            this.label17_receita.Size = new System.Drawing.Size(32, 13);
            this.label17_receita.TabIndex = 15;
            this.label17_receita.Text = "0,00";
            // 
            // label18
            // 
            this.label18.AutoSize = true;
            this.label18.Location = new System.Drawing.Point(462, 332);
            this.label18.Name = "label18";
            this.label18.Size = new System.Drawing.Size(110, 13);
            this.label18.TabIndex = 16;
            this.label18.Text = " Investimentos       R$";
            // 
            // label19_investimentos
            // 
            this.label19_investimentos.AutoSize = true;
            this.label19_investimentos.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label19_investimentos.Location = new System.Drawing.Point(576, 332);
            this.label19_investimentos.Name = "label19_investimentos";
            this.label19_investimentos.Size = new System.Drawing.Size(32, 13);
            this.label19_investimentos.TabIndex = 17;
            this.label19_investimentos.Text = "0,00";
            // 
            // label20
            // 
            this.label20.AutoSize = true;
            this.label20.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label20.Location = new System.Drawing.Point(461, 387);
            this.label20.Name = "label20";
            this.label20.Size = new System.Drawing.Size(87, 24);
            this.label20.TabIndex = 18;
            this.label20.Text = "Total R$";
            // 
            // label21_total_resultado
            // 
            this.label21_total_resultado.AutoSize = true;
            this.label21_total_resultado.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label21_total_resultado.Location = new System.Drawing.Point(568, 391);
            this.label21_total_resultado.Name = "label21_total_resultado";
            this.label21_total_resultado.Size = new System.Drawing.Size(40, 20);
            this.label21_total_resultado.TabIndex = 19;
            this.label21_total_resultado.Text = "0,00";
            // 
            // monthCalendar1
            // 
            this.monthCalendar1.Location = new System.Drawing.Point(988, -9);
            this.monthCalendar1.Name = "monthCalendar1";
            this.monthCalendar1.TabIndex = 21;
            this.monthCalendar1.Visible = false;
            // 
            // LabelSelectedF
            // 
            this.LabelSelectedF.AutoSize = true;
            this.LabelSelectedF.Location = new System.Drawing.Point(12, 207);
            this.LabelSelectedF.Name = "LabelSelectedF";
            this.LabelSelectedF.Size = new System.Drawing.Size(100, 13);
            this.LabelSelectedF.TabIndex = 23;
            this.LabelSelectedF.Text = "Campo selecionado";
            // 
            // label6_metas
            // 
            this.label6_metas.AutoSize = true;
            this.label6_metas.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label6_metas.Location = new System.Drawing.Point(576, 356);
            this.label6_metas.Name = "label6_metas";
            this.label6_metas.Size = new System.Drawing.Size(32, 13);
            this.label6_metas.TabIndex = 25;
            this.label6_metas.Text = "0,00";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(466, 356);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(113, 13);
            this.label7.TabIndex = 24;
            this.label7.Text = "Metas                   R$  ";
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::frm_login.Properties.Resources.soologoazul;
            this.pictureBox1.Location = new System.Drawing.Point(421, 12);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(227, 50);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 35;
            this.pictureBox1.TabStop = false;
            // 
            // button1_pesquisar
            // 
            this.button1_pesquisar.BackgroundImage = global::frm_login.Properties.Resources.testebut14;
            this.button1_pesquisar.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.button1_pesquisar.Location = new System.Drawing.Point(465, 454);
            this.button1_pesquisar.Name = "button1_pesquisar";
            this.button1_pesquisar.Size = new System.Drawing.Size(180, 46);
            this.button1_pesquisar.TabIndex = 22;
            this.button1_pesquisar.UseVisualStyleBackColor = true;
            this.button1_pesquisar.Click += new System.EventHandler(this.button1_pesquisar_Click);
            // 
            // Form2
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(657, 522);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.label6_metas);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.LabelSelectedF);
            this.Controls.Add(this.button1_pesquisar);
            this.Controls.Add(this.monthCalendar1);
            this.Controls.Add(this.label21_total_resultado);
            this.Controls.Add(this.label20);
            this.Controls.Add(this.label19_investimentos);
            this.Controls.Add(this.label18);
            this.Controls.Add(this.label17_receita);
            this.Controls.Add(this.label16);
            this.Controls.Add(this.label4_despesa);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.TabControl);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.label2_data2);
            this.Controls.Add(this.label1_data1);
            this.Name = "Form2";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Consulta da receita";
            this.Load += new System.EventHandler(this.Form2_Load);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.TabControl.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tabPage2.ResumeLayout(false);
            this.tabPage3.ResumeLayout(false);
            this.tab_metas.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DateTimePicker dateTimePicker1_dataInicio;
        private System.Windows.Forms.DateTimePicker dateTimePicker2dataFim;
        private System.Windows.Forms.Label label1_data1;
        private System.Windows.Forms.Label label2_data2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.TabControl TabControl;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.ListBox listBox1_despesa;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.TabPage tabPage3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label4_despesa;
        private System.Windows.Forms.Label label16;
        private System.Windows.Forms.Label label17_receita;
        private System.Windows.Forms.Label label18;
        private System.Windows.Forms.Label label19_investimentos;
        private System.Windows.Forms.Label label20;
        private System.Windows.Forms.Label label21_total_resultado;
        private System.Windows.Forms.MonthCalendar monthCalendar1;
        private System.Windows.Forms.Button button1_pesquisar;
        private System.Windows.Forms.TabPage tab_metas;
        private System.Windows.Forms.Label LabelSelectedF;
        private System.Windows.Forms.ListBox listBox3_investimento;
        private System.Windows.Forms.ListBox listBox2_receita;
        private System.Windows.Forms.ListBox listBox4_metas;
        private System.Windows.Forms.Label label6_metas;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.PictureBox pictureBox1;
    }
}