using System;
using System.Collections.Generic;

namespace ConsoleApp8
{
    internal class Exemplar
    {
        private int tombo;
        private List<Emprestimo> emprestimos;


        public bool emprestar()
        {
            return false;
        }

        public bool devolver()
        {
            return false;
        }

        public bool disponivel()
        {
            return false;
        }

        public int qtdeEmprestimos()
        {
            return 0;
        }

        public static implicit operator List<object>(Exemplar v)
        {
            throw new NotImplementedException();
        }
    }
}