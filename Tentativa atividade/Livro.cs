using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp8
{
    class Livro
    {
        private int isbn;
        private string titulo;
        private string autor;
        private string editora;
        private List<Exemplar> exemplares;

        

        public void setIsbn(int isbn)
        {
            this.isbn = isbn;
            
        }

        public void setTitulo(string titulo)
        {
            this.titulo = titulo;

        }

        public void setAutor(string autor)
        {
            this.autor = autor;

        }

        public void setEditora(string editora)
        {
            this.editora = editora;

        }

        public int getIsbn()
        {
            return this.isbn;

        }

        public string getTitulo()
        {
            return this.titulo;

        }

        public string getAutor()
        {
            return this.autor;

        }

        public string getEditora()
        {
            return this.editora;

        }

        public void adicionarExemplar(Exemplar exemplar)
        {
        
        }

        public int qtdeExemplares()
        {

            return 0;

        }

        public int qtdeDisponiveis()
        {
            return 0;
        }

        public int qtdeEmprestimo()
        {
            return 0;
        }

        public double percDisponibilicade()
        {
            return 0;
        }

       
    }
}
