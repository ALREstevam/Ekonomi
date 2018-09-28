using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace frm_login
{
    class Global
    {
    }

    public static class Usuario
    {
            private static string m_Nome = "";
            public static string Nome
            {
                get { return m_Nome; }
                set { m_Nome = value; }
            }




            private static string m_Email = "";
            public static string Email
            {
                get { return m_Email; }
                set { m_Email = value; }
            }

            private static string m_ID_Usuario = "";
            public static string ID_Usuario
            {
                get { return m_ID_Usuario; }
                set { m_ID_Usuario = value; }
            }



            private static string m_Foto = "";
            public static string Foto
            {
                get { return m_Foto; }
                set { m_Foto = value; }
            }

            private static string m_Senha = "";
            public static string Senha
            {
                get { return m_Senha; }
                set { m_Senha = value; }
            }

        }
    }




