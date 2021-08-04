using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Sistema_Cantina
{
    public partial class Form1 : Form
    {
        string[] codigo = new string[6];
        string[] produto = new string[6];
        double[] valor = new double[6];
        double soma;
        

        

        public Form1()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void textCodigo1_TextChanged(object sender, EventArgs e)
        {
            
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            carregarArray();
            soma = 0;
        }

        private void carregarArray()
        {
            codigo[0] = "001";
            codigo[1] = "002";
            codigo[2] = "003";
            codigo[3] = "004";
            codigo[4] = "005";
            codigo[5] = "006";

            produto[0] = "Steak";
            produto[1] = "Coca";
            produto[2] = "Empada";
            produto[3] = "Hot dog";
            produto[4] = "Coxinha";
            produto[5] = "Uva";

            valor[0] = 6.50;
            valor[1] = 5.00;
            valor[2] = 3.00;
            valor[3] = 8.00;
            valor[4] = 2.00;
            valor[5] = 1.00;
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            if (textCodigo1.Text.Length == 3)
            {
                int p;
                for (p = 0; p < codigo.Length; p++)
                {
                    if (textCodigo1.Text == codigo[p])
                    {
                        listaCodigo.Items.Add(textCodigo1.Text + " -- " + produto[p] + " -- R$ " + valor[p]);
                        textCodigo1.Text = "";

                        soma = soma + valor[p];
                        label3.Text = ("VALOR TOTAL R$ " + soma);
                      
                    }
                    else if (textCodigo1.Text == "000")
                    {
                        MessageBox.Show("Codigo Invalido", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        textCodigo1.Text = "";
                        textCodigo1.Focus();
                    }
                   
                }

            }
        }

        private void btnLimp_Click(object sender, EventArgs e)
        {
            listaCodigo.Items.Clear();
            textCodigo1.Text = "";
            label3.Text = ("VALOR TOTAL R$ ");
        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
