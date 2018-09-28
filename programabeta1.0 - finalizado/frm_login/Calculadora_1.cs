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
    public partial class Calculadora_1 : Form
    {
        string zeromsg = "Não dividirás por zero!";
        string output = "0", novonumero = "0", valor1 = "0", valor2 = "0", operacao, resultado = "0";
        decimal valor1_decimal, valor2_decimal, resultado_decimal;
        private GroupBox groupBox1;
        private Button button_copiar;
        private Button button_del_c;
        private Button button_backspace;
        private Button button_porcento;
        private Button button_igual;
        private Button button_divisao;
        private Button button_multiplicacao;
        private Button button_subtracao;
        private Button button_adicao;
        private Button numero0;
        private Button numero9;
        private Button numero8;
        private Button numero7;
        private Button numero6;
        private Button numero5;
        private Button numero4;
        private Button numero3;
        private Button numero2;
        private TextBox textBox_auxiliar;
        private TextBox textBox1_output;
        private Button numero1;
        private Button button_virgula;
        private PictureBox pictureBox1;
        int qntvirg = 0;
       
        

        public Calculadora_1()
        {
            InitializeComponent();
            textBox1_output.Text = "0";
            
        }


        
//BOTÕES DE NÚMEROS

        private void numero0_Click(object sender, EventArgs e)
        {
            novonumero = "0";
            numero_output();
        }


        private void numero1_Click(object sender, EventArgs e)
        {
            novonumero = "1";
            numero_output();
        }

        private void numero2_Click(object sender, EventArgs e)
        {
            novonumero = "2";
            numero_output();
        }

        private void numero3_Click(object sender, EventArgs e)
        {
            novonumero = "3";
            numero_output();
        }

        private void numero4_Click(object sender, EventArgs e)
        {
            novonumero = "4";
            numero_output();
        }

        private void numero5_Click(object sender, EventArgs e)
        {
            novonumero = "5";
            numero_output();
        }

        private void numero6_Click(object sender, EventArgs e)
        {
            novonumero = "6";
            numero_output();
        }

        private void numero7_Click(object sender, EventArgs e)
        {
            novonumero = "7";
            numero_output();
        }

        private void numero8_Click(object sender, EventArgs e)
        {
            novonumero = "8";
            numero_output();
        }

        private void numero9_Click(object sender, EventArgs e)
        {
            novonumero = "9";
            numero_output();
        }


        private void button_virgula_Click(object sender, EventArgs e)
        {



            string xpto = textBox1_output.Text;

            if (xpto == "0" || xpto == zeromsg)
            {
                textBox1_output.Text = "0";
                output = textBox1_output.Text;
            }


            int numVirgulas = (xpto.Split(',').Length);




            if (qntvirg == 0)
            {
                novonumero = ",";
                output = textBox1_output.Text;
                textBox1_output.Text = output + novonumero;

                qntvirg++;
            }



        }




//MÉTODO QUE COLOCA O NÚMERO DIGITADO NO VISOR

        public void numero_output()
        {
            output = textBox1_output.Text; //o que está sendo exibido
            
           

            if(output == "0" || output == zeromsg){
                textBox1_output.Text = "";
                output = textBox1_output.Text;
            }

            
            textBox1_output.Text = output + novonumero; //o que está sendo exibido + número digitado

        }

        
//APAGA TUDO
        private void button_del_c_Click(object sender, EventArgs e)
        {
            textBox1_output.Text = "0";
            textBox_auxiliar.Text = "";
           
            valor1_decimal = 0;
            valor2_decimal = 0;

            qntvirg = 0; //ZERA QUANTIDADE DE VÍRGULAS

         

        }


//APAGA ÚLTIMO CARACTERE
        private void button_backspace_Click(object sender, EventArgs e)
        {

            string output_del = textBox1_output.Text;

            if (textBox1_output.TextLength >= 1)
            {
            output_del = output_del.Remove(output_del.Length - 1);
            }

            if (textBox1_output.TextLength == 0)
            {
                output_del = "0";
            }

            textBox1_output.Text = output_del;

  
        }


//OPERAÇÕES

        private void button_adicao_Click(object sender, EventArgs e)
        {
            valor1 = textBox1_output.Text;
            qntvirg = 0; //ZERA QUANTIDADE DE VÍRGULAS

                if (valor1 == zeromsg || valor1 == "") 
                {
                textBox1_output.Text = "0"; 
                valor1 = textBox1_output.Text;
                }

            textBox_auxiliar.Text = valor1 + " + ";
            textBox1_output.Text = "0";

           valor1_decimal = decimal.Parse(valor1);

           
           operacao = "+";

        }


        private void button_subtracao_Click(object sender, EventArgs e)
        {
            valor1 = textBox1_output.Text;
            qntvirg = 0; //ZERA QUANTIDADE DE VÍRGULAS

            if (valor1 == zeromsg || valor1 == "") 
            {
                textBox1_output.Text = "0"; 
                valor1 = textBox1_output.Text;
            }


            textBox_auxiliar.Text = valor1 + " - ";//TEXTBOX AUXILIAR!
            textBox1_output.Text = "0";

            valor1_decimal = decimal.Parse(valor1);

            
            operacao = "-"; //OPERARAÇÃO!
        }

        private void button_multiplicacao_Click(object sender, EventArgs e)
        {
            valor1 = textBox1_output.Text;
            qntvirg = 0; //ZERA QUANTIDADE DE VÍRGULAS

            if (valor1 == zeromsg || valor1 == "") 
            {
                textBox1_output.Text = "0";
                valor1 = textBox1_output.Text;
            }


            textBox_auxiliar.Text = valor1 + " * ";//TEXTBOX AUXILIAR!
            textBox1_output.Text = "0";

            valor1_decimal = decimal.Parse(valor1);

         
            operacao = "*"; //OPERARAÇÃO!
        }

        private void button_divisao_Click(object sender, EventArgs e)
        {
            valor1 = textBox1_output.Text;
            qntvirg = 0; //ZERA QUANTIDADE DE VÍRGULAS

            if (valor1 == zeromsg || valor1 == "") 
            {
                textBox1_output.Text = "0";
                valor1 = textBox1_output.Text;
            }


            textBox_auxiliar.Text = valor1 + " / ";//TEXTBOX AUXILIAR!
            textBox1_output.Text = "0";

            valor1_decimal = decimal.Parse(valor1);

           
            operacao = "/"; //OPERARAÇÃO!
        }


        private void button_porcento_Click(object sender, EventArgs e)
        {
            qntvirg = 1; //ZERA QUANTIDADE DE VÍRGULAS

            valor2 = textBox1_output.Text;
            switch (operacao)
            {
                case "+":
                    textBox_auxiliar.Text = valor1 + " + " + valor2 + "%";
                    break;

                case "-":
                    textBox_auxiliar.Text = valor1 + " - " + valor2 + "%";
                    break;

                case "*":
                    textBox_auxiliar.Text = valor1 + " * " + valor2 + "%";
                    break;

                case "/":
                    textBox_auxiliar.Text = valor1 + " / " + valor2 + "%";
                    break;

            }
            if (valor2 != "")
            {

                valor2_decimal = decimal.Parse(valor2);
                valor2_decimal = (valor1_decimal * valor2_decimal) / 100;

                valor2 = valor2_decimal.ToString();
                textBox1_output.Text = valor2;
            }
            else
            {
                MessageBox.Show("Valores incompletos");
            }
        }













//SINAL DE IGUAL

        private void button_igual_Click(object sender, EventArgs e)
        {





            
            valor2 = textBox1_output.Text;

            if (valor2 == "" || valor1 == "" || valor1 == zeromsg || valor2 == zeromsg || valor1 == zeromsg+"," || valor2 == zeromsg+",")
            {
                MessageBox.Show("Valores incompletos! \n complete os campos corretamente");
            }
            else
            {
                switch (operacao)
                {
                    case "+":


                        valor2 = textBox1_output.Text;

                        textBox_auxiliar.Text = valor1 + " + " + valor2;  //textbox auxiliar!

                        converter_valor2();

                        resultado_decimal = valor1_decimal + valor2_decimal; //conta em sí!

                        break;


                    case "-":


                        valor2 = textBox1_output.Text;

                        textBox_auxiliar.Text = valor1 + " - " + valor2;  //textbox auxiliar!

                        converter_valor2();

                        resultado_decimal = valor1_decimal - valor2_decimal; //conta em sí!

        
                        break;

                    case "*":


                        valor2 = textBox1_output.Text;

                        textBox_auxiliar.Text = valor1 + " * " + valor2;  //textbox auxiliar!

                        converter_valor2();

                        resultado_decimal = valor1_decimal * valor2_decimal; //conta em sí!

                        break;

                    case "/":




                        valor2 = textBox1_output.Text;

                        textBox_auxiliar.Text = valor1 + " / " + valor2;  //textbox auxiliar!
                        converter_valor2();

                        if (valor2_decimal != 0)
                        {
                            resultado_decimal = valor1_decimal / valor2_decimal; //conta em sí!
                           
                            resultado_decimal = Math.Round(resultado_decimal, 2);

                            resultado = resultado_decimal.ToString();
                            textBox1_output.Text = resultado;

                            textBox_auxiliar.Text = "";
                            valor1 = resultado;
                        
                        }
                       
                        
                        
                        else {
                            textBox1_output.Text = "0";
                            MessageBox.Show(zeromsg);
                        }

                        break;

                }



                if(operacao != "/"){

                
                resultado_decimal = Math.Round(resultado_decimal, 2);

                resultado = resultado_decimal.ToString();
                textBox1_output.Text = resultado;

                textBox_auxiliar.Text = "";
                valor1 = resultado;
                    }
            }





        }






//CONVERTER STRING VALOR2 PARA FLOAT VALOR2
        public void converter_valor2()
        {
            if (valor2 != "" && valor2 != "," && valor2 != "%" && valor2 != "Não dividirás por zero!" && valor2 != "-")
            {
            valor2_decimal = decimal.Parse(valor2);
           }
        }
//COPIAR
        private void button_copiar_Click(object sender, EventArgs e)
        {
            Clipboard.SetText(textBox1_output.Text);
        }

//KEYPRESS 


        public void teclado_pressionado(object sender, KeyPressEventArgs e)
        {
          
            
            
            //NÚMEROS
            if (e.KeyChar == 48)
            {
                numero0_Click(sender, e);      
            }

            if (e.KeyChar == 49)
            {
                numero1_Click(sender, e);
            }

            if (e.KeyChar == 50)
            {
                numero2_Click(sender, e);
            }

            if (e.KeyChar == 51)
            {
                numero3_Click(sender, e);
            }
           
            if (e.KeyChar == 52)
            {
                numero4_Click(sender, e);
            }
            if (e.KeyChar == 53)
            {
                numero5_Click(sender, e);
            }
            if (e.KeyChar == 54)
            {
                numero6_Click(sender, e);
            }
            if (e.KeyChar == 55)
            {
                numero7_Click(sender, e);
            }
            if (e.KeyChar == 56)
            {
                numero8_Click(sender, e);
            }
            if (e.KeyChar == 57)
            {
                numero9_Click(sender, e);
            }

            //VÍRGULA
            if (e.KeyChar == 44 || e.KeyChar == 14)
            {
                button_virgula_Click(sender, e);
            }


            //OPERAÇÕES

            if (e.KeyChar == 43)//  +
            {
                button_adicao_Click(sender, e);
            }

            if (e.KeyChar == 45)//  -
            {
                button_subtracao_Click(sender, e);
            }

            if (e.KeyChar == 47)// /
            {
                button_divisao_Click(sender, e);
            }

            if (e.KeyChar == 42)// *
            {
                button_multiplicacao_Click(sender, e);
            }

            if (e.KeyChar == 37)//  %
            {
                button_porcento_Click(sender, e);
            }


            //IGUAL

            if (e.KeyChar == 61 || e.KeyChar == 13)//  =
            {
                button_igual_Click(sender, e);
            }


            //DELETES

            if (e.KeyChar == 08)//  backspace
            {
                button_backspace_Click(sender, e);
            }

            if (e.KeyChar == 27)//  c
            {
                button_del_c_Click(sender, e);
            }


        }





        private void textBox1_output_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender,  e);

        }




        private void numero0_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero1_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero2_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero3_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero4_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero5_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero6_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero7_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero8_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void numero9_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }



        private void button_adicao_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void button_subtracao_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void button_multiplicacao_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void button_divisao_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void button_porcento_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }
        private void button_igual_KeyPress(object sender, KeyPressEventArgs e)
        {
            teclado_pressionado(sender, e);
        }

        private void InitializeComponent()
        {
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.button_virgula = new System.Windows.Forms.Button();
            this.button_copiar = new System.Windows.Forms.Button();
            this.button_del_c = new System.Windows.Forms.Button();
            this.button_backspace = new System.Windows.Forms.Button();
            this.button_porcento = new System.Windows.Forms.Button();
            this.button_igual = new System.Windows.Forms.Button();
            this.button_divisao = new System.Windows.Forms.Button();
            this.button_multiplicacao = new System.Windows.Forms.Button();
            this.button_subtracao = new System.Windows.Forms.Button();
            this.button_adicao = new System.Windows.Forms.Button();
            this.numero0 = new System.Windows.Forms.Button();
            this.numero9 = new System.Windows.Forms.Button();
            this.numero8 = new System.Windows.Forms.Button();
            this.numero7 = new System.Windows.Forms.Button();
            this.numero6 = new System.Windows.Forms.Button();
            this.numero5 = new System.Windows.Forms.Button();
            this.numero4 = new System.Windows.Forms.Button();
            this.numero3 = new System.Windows.Forms.Button();
            this.numero2 = new System.Windows.Forms.Button();
            this.textBox_auxiliar = new System.Windows.Forms.TextBox();
            this.textBox1_output = new System.Windows.Forms.TextBox();
            this.numero1 = new System.Windows.Forms.Button();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.groupBox1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.button_virgula);
            this.groupBox1.Controls.Add(this.button_copiar);
            this.groupBox1.Controls.Add(this.button_del_c);
            this.groupBox1.Controls.Add(this.button_backspace);
            this.groupBox1.Controls.Add(this.button_porcento);
            this.groupBox1.Controls.Add(this.button_igual);
            this.groupBox1.Controls.Add(this.button_divisao);
            this.groupBox1.Controls.Add(this.button_multiplicacao);
            this.groupBox1.Controls.Add(this.button_subtracao);
            this.groupBox1.Controls.Add(this.button_adicao);
            this.groupBox1.Controls.Add(this.numero0);
            this.groupBox1.Controls.Add(this.numero9);
            this.groupBox1.Controls.Add(this.numero8);
            this.groupBox1.Controls.Add(this.numero7);
            this.groupBox1.Controls.Add(this.numero6);
            this.groupBox1.Controls.Add(this.numero5);
            this.groupBox1.Controls.Add(this.numero4);
            this.groupBox1.Controls.Add(this.numero3);
            this.groupBox1.Controls.Add(this.numero2);
            this.groupBox1.Controls.Add(this.textBox_auxiliar);
            this.groupBox1.Controls.Add(this.textBox1_output);
            this.groupBox1.Controls.Add(this.numero1);
            this.groupBox1.Font = new System.Drawing.Font("Arial Rounded MT Bold", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.groupBox1.Location = new System.Drawing.Point(12, 73);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(447, 437);
            this.groupBox1.TabIndex = 0;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Calculadora";
            this.groupBox1.Enter += new System.EventHandler(this.groupBox1_Enter);
            // 
            // button_virgula
            // 
            this.button_virgula.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_virgula.ForeColor = System.Drawing.Color.Red;
            this.button_virgula.Location = new System.Drawing.Point(144, 344);
            this.button_virgula.Name = "button_virgula";
            this.button_virgula.Size = new System.Drawing.Size(61, 67);
            this.button_virgula.TabIndex = 22;
            this.button_virgula.Text = ",";
            this.button_virgula.UseVisualStyleBackColor = true;
            this.button_virgula.Click += new System.EventHandler(this.button_virgula_Click);
            // 
            // button_copiar
            // 
            this.button_copiar.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_copiar.ForeColor = System.Drawing.Color.Red;
            this.button_copiar.Location = new System.Drawing.Point(361, 32);
            this.button_copiar.Name = "button_copiar";
            this.button_copiar.Size = new System.Drawing.Size(73, 74);
            this.button_copiar.TabIndex = 21;
            this.button_copiar.Text = "Copiar";
            this.button_copiar.UseVisualStyleBackColor = true;
            this.button_copiar.Click += new System.EventHandler(this.button_copiar_Click);
            // 
            // button_del_c
            // 
            this.button_del_c.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_del_c.ForeColor = System.Drawing.Color.Red;
            this.button_del_c.Location = new System.Drawing.Point(365, 344);
            this.button_del_c.Name = "button_del_c";
            this.button_del_c.Size = new System.Drawing.Size(61, 67);
            this.button_del_c.TabIndex = 20;
            this.button_del_c.Text = "C";
            this.button_del_c.UseVisualStyleBackColor = true;
            this.button_del_c.Click += new System.EventHandler(this.button_del_c_Click);
            // 
            // button_backspace
            // 
            this.button_backspace.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_backspace.ForeColor = System.Drawing.Color.Red;
            this.button_backspace.Location = new System.Drawing.Point(298, 344);
            this.button_backspace.Name = "button_backspace";
            this.button_backspace.Size = new System.Drawing.Size(61, 67);
            this.button_backspace.TabIndex = 19;
            this.button_backspace.Text = "Bkspc";
            this.button_backspace.UseVisualStyleBackColor = true;
            this.button_backspace.Click += new System.EventHandler(this.button_backspace_Click);
            // 
            // button_porcento
            // 
            this.button_porcento.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_porcento.ForeColor = System.Drawing.Color.Red;
            this.button_porcento.Location = new System.Drawing.Point(298, 125);
            this.button_porcento.Name = "button_porcento";
            this.button_porcento.Size = new System.Drawing.Size(61, 67);
            this.button_porcento.TabIndex = 18;
            this.button_porcento.Text = "%";
            this.button_porcento.UseVisualStyleBackColor = true;
            this.button_porcento.Click += new System.EventHandler(this.button_porcento_Click);
            this.button_porcento.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_porcento_KeyPress);
            // 
            // button_igual
            // 
            this.button_igual.Font = new System.Drawing.Font("Microsoft Sans Serif", 36F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_igual.ForeColor = System.Drawing.Color.Red;
            this.button_igual.Location = new System.Drawing.Point(298, 198);
            this.button_igual.Name = "button_igual";
            this.button_igual.Size = new System.Drawing.Size(61, 140);
            this.button_igual.TabIndex = 17;
            this.button_igual.Text = "=";
            this.button_igual.UseVisualStyleBackColor = true;
            this.button_igual.Click += new System.EventHandler(this.button_igual_Click);
            this.button_igual.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_igual_KeyPress);
            // 
            // button_divisao
            // 
            this.button_divisao.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_divisao.ForeColor = System.Drawing.Color.Red;
            this.button_divisao.Location = new System.Drawing.Point(231, 344);
            this.button_divisao.Name = "button_divisao";
            this.button_divisao.Size = new System.Drawing.Size(61, 67);
            this.button_divisao.TabIndex = 16;
            this.button_divisao.Text = "/";
            this.button_divisao.UseVisualStyleBackColor = true;
            this.button_divisao.Click += new System.EventHandler(this.button_divisao_Click);
            this.button_divisao.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_divisao_KeyPress);
            // 
            // button_multiplicacao
            // 
            this.button_multiplicacao.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_multiplicacao.ForeColor = System.Drawing.Color.Red;
            this.button_multiplicacao.Location = new System.Drawing.Point(231, 271);
            this.button_multiplicacao.Name = "button_multiplicacao";
            this.button_multiplicacao.Size = new System.Drawing.Size(61, 67);
            this.button_multiplicacao.TabIndex = 15;
            this.button_multiplicacao.Text = "*";
            this.button_multiplicacao.UseVisualStyleBackColor = true;
            this.button_multiplicacao.Click += new System.EventHandler(this.button_multiplicacao_Click);
            this.button_multiplicacao.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_multiplicacao_KeyPress);
            // 
            // button_subtracao
            // 
            this.button_subtracao.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_subtracao.ForeColor = System.Drawing.Color.Red;
            this.button_subtracao.Location = new System.Drawing.Point(231, 198);
            this.button_subtracao.Name = "button_subtracao";
            this.button_subtracao.Size = new System.Drawing.Size(61, 67);
            this.button_subtracao.TabIndex = 14;
            this.button_subtracao.Text = "-";
            this.button_subtracao.UseVisualStyleBackColor = true;
            this.button_subtracao.Click += new System.EventHandler(this.button_subtracao_Click);
            this.button_subtracao.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_subtracao_KeyPress);
            // 
            // button_adicao
            // 
            this.button_adicao.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.button_adicao.ForeColor = System.Drawing.Color.Red;
            this.button_adicao.Location = new System.Drawing.Point(231, 125);
            this.button_adicao.Name = "button_adicao";
            this.button_adicao.Size = new System.Drawing.Size(61, 67);
            this.button_adicao.TabIndex = 13;
            this.button_adicao.Text = "+";
            this.button_adicao.UseVisualStyleBackColor = true;
            this.button_adicao.Click += new System.EventHandler(this.button_adicao_Click);
            this.button_adicao.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.button_adicao_KeyPress);
            // 
            // numero0
            // 
            this.numero0.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero0.ForeColor = System.Drawing.Color.Blue;
            this.numero0.Location = new System.Drawing.Point(10, 344);
            this.numero0.Name = "numero0";
            this.numero0.Size = new System.Drawing.Size(128, 67);
            this.numero0.TabIndex = 12;
            this.numero0.Text = "0";
            this.numero0.UseVisualStyleBackColor = true;
            this.numero0.Click += new System.EventHandler(this.numero0_Click);
            this.numero0.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero0_KeyPress);
            // 
            // numero9
            // 
            this.numero9.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero9.ForeColor = System.Drawing.Color.Blue;
            this.numero9.Location = new System.Drawing.Point(144, 125);
            this.numero9.Name = "numero9";
            this.numero9.Size = new System.Drawing.Size(61, 67);
            this.numero9.TabIndex = 11;
            this.numero9.Text = "9";
            this.numero9.UseVisualStyleBackColor = true;
            this.numero9.Click += new System.EventHandler(this.numero9_Click);
            this.numero9.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero9_KeyPress);
            // 
            // numero8
            // 
            this.numero8.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero8.ForeColor = System.Drawing.Color.Blue;
            this.numero8.Location = new System.Drawing.Point(77, 125);
            this.numero8.Name = "numero8";
            this.numero8.Size = new System.Drawing.Size(61, 67);
            this.numero8.TabIndex = 10;
            this.numero8.Text = "8";
            this.numero8.UseVisualStyleBackColor = true;
            this.numero8.Click += new System.EventHandler(this.numero8_Click);
            this.numero8.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero8_KeyPress);
            // 
            // numero7
            // 
            this.numero7.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero7.ForeColor = System.Drawing.Color.Blue;
            this.numero7.Location = new System.Drawing.Point(10, 125);
            this.numero7.Name = "numero7";
            this.numero7.Size = new System.Drawing.Size(61, 67);
            this.numero7.TabIndex = 9;
            this.numero7.Text = "7";
            this.numero7.UseVisualStyleBackColor = true;
            this.numero7.Click += new System.EventHandler(this.numero7_Click);
            this.numero7.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero7_KeyPress);
            // 
            // numero6
            // 
            this.numero6.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero6.ForeColor = System.Drawing.Color.Blue;
            this.numero6.Location = new System.Drawing.Point(144, 198);
            this.numero6.Name = "numero6";
            this.numero6.Size = new System.Drawing.Size(61, 67);
            this.numero6.TabIndex = 8;
            this.numero6.Text = "6";
            this.numero6.UseVisualStyleBackColor = true;
            this.numero6.Click += new System.EventHandler(this.numero6_Click);
            this.numero6.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero6_KeyPress);
            // 
            // numero5
            // 
            this.numero5.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero5.ForeColor = System.Drawing.Color.Blue;
            this.numero5.Location = new System.Drawing.Point(77, 198);
            this.numero5.Name = "numero5";
            this.numero5.Size = new System.Drawing.Size(61, 67);
            this.numero5.TabIndex = 7;
            this.numero5.Text = "5";
            this.numero5.UseVisualStyleBackColor = true;
            this.numero5.Click += new System.EventHandler(this.numero5_Click);
            this.numero5.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero5_KeyPress);
            // 
            // numero4
            // 
            this.numero4.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero4.ForeColor = System.Drawing.Color.Blue;
            this.numero4.Location = new System.Drawing.Point(10, 198);
            this.numero4.Name = "numero4";
            this.numero4.Size = new System.Drawing.Size(61, 67);
            this.numero4.TabIndex = 6;
            this.numero4.Text = "4";
            this.numero4.UseVisualStyleBackColor = true;
            this.numero4.Click += new System.EventHandler(this.numero4_Click);
            this.numero4.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero4_KeyPress);
            // 
            // numero3
            // 
            this.numero3.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero3.ForeColor = System.Drawing.Color.Blue;
            this.numero3.Location = new System.Drawing.Point(144, 271);
            this.numero3.Name = "numero3";
            this.numero3.Size = new System.Drawing.Size(61, 67);
            this.numero3.TabIndex = 5;
            this.numero3.Text = "3";
            this.numero3.UseVisualStyleBackColor = true;
            this.numero3.Click += new System.EventHandler(this.numero3_Click);
            this.numero3.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero3_KeyPress);
            // 
            // numero2
            // 
            this.numero2.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero2.ForeColor = System.Drawing.Color.Blue;
            this.numero2.Location = new System.Drawing.Point(77, 271);
            this.numero2.Name = "numero2";
            this.numero2.Size = new System.Drawing.Size(61, 67);
            this.numero2.TabIndex = 4;
            this.numero2.Text = "2";
            this.numero2.UseVisualStyleBackColor = true;
            this.numero2.Click += new System.EventHandler(this.numero2_Click);
            this.numero2.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero2_KeyPress);
            // 
            // textBox_auxiliar
            // 
            this.textBox_auxiliar.Font = new System.Drawing.Font("Microsoft Sans Serif", 15.75F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox_auxiliar.Location = new System.Drawing.Point(6, 34);
            this.textBox_auxiliar.Name = "textBox_auxiliar";
            this.textBox_auxiliar.ReadOnly = true;
            this.textBox_auxiliar.Size = new System.Drawing.Size(349, 31);
            this.textBox_auxiliar.TabIndex = 3;
            // 
            // textBox1_output
            // 
            this.textBox1_output.Font = new System.Drawing.Font("Microsoft Sans Serif", 24F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.textBox1_output.Location = new System.Drawing.Point(6, 62);
            this.textBox1_output.Name = "textBox1_output";
            this.textBox1_output.ReadOnly = true;
            this.textBox1_output.Size = new System.Drawing.Size(349, 44);
            this.textBox1_output.TabIndex = 2;
            // 
            // numero1
            // 
            this.numero1.Font = new System.Drawing.Font("Microsoft Sans Serif", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.numero1.ForeColor = System.Drawing.Color.Blue;
            this.numero1.Location = new System.Drawing.Point(10, 271);
            this.numero1.Name = "numero1";
            this.numero1.Size = new System.Drawing.Size(61, 67);
            this.numero1.TabIndex = 1;
            this.numero1.Text = "1";
            this.numero1.UseVisualStyleBackColor = true;
            this.numero1.Click += new System.EventHandler(this.numero1_Click);
            this.numero1.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.numero1_KeyPress);
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::frm_login.Properties.Resources.soologoazul;
            this.pictureBox1.Location = new System.Drawing.Point(232, 12);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(227, 50);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 6;
            this.pictureBox1.TabStop = false;
            // 
            // Calculadora_1
            // 
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(472, 522);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.groupBox1);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Name = "Calculadora_1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Calculadora";
            this.Load += new System.EventHandler(this.Calculadora_1_Load);
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);

        }

        private void Calculadora_1_Load(object sender, EventArgs e)
        {

        }

        private void groupBox1_Enter(object sender, EventArgs e)
        {

        }

 


        


        













    }
}
