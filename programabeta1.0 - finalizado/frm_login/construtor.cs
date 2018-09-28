using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace frm_login
{
    class construtor
    {
        //ids
        public int id_despesa { get; set; }
        public int id_receita { get; set; }
        public int id_investimento { get; set; }
        public int id_meta { get; set; }
        public int id_parcela { get; set; }

        //parcelas
        public int n_parcelas { get; set; }
        public String valor_parc { get; set; }
        public DateTime data_parc { get; set; }


        //frm_despesa  
        public String valor { get; set; }
        public String despesa { get; set; }
        public String categoria { get; set; }
        public String tipo { get; set; }
        public DateTime data { get; set; }
        public String desc { get; set; }
        

        //frm_receita
        public String valorec { get; set; }
        public String tiporec { get; set; }
        public DateTime datarec { get; set; }
        public String obsrec { get; set; }
        
        //frm_investimento
        public String tipoi { get; set; }
        public String obs { get; set; }
        public DateTime datai { get; set; }
        public String valori { get; set; }

        //frmmeta //nos nao temos uma meta, mas quando alcançarmos essa meta, nós dobraremos a meta! ~Roussef, Dilma
        public String Nome_Meta { get; set; }
        public String Valor_Meta { get; set; }
        public DateTime Data_Meta { get; set; }


        //public String total { get; set; }

     
        //DateTime data = DateTime.Parse();
       

    }
}
