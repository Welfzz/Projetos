using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp8
{
    class Livros
    {

        private List<Livro> acervo;


        public void adicionar(Livro livro)
        {
            acervo.Add(livro);
        }

        public Livro pesquisar(Livro livro)
        {
            return livro;
        }

    }
}
