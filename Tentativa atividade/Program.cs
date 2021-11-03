using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp8
{
    class Program
    {
        static void Main(string[] args)
        {

            int decisao;
            Livro livro = new Livro();

            do
            {


                Console.WriteLine("0. Sair");
                Console.WriteLine("1. Adicionar livro");
                Console.WriteLine("2. Pesquisar livro (sintético)");
                Console.WriteLine("3. Pesquisar livro (analítico)");
                Console.WriteLine("4. Adicionar exemplar");
                Console.WriteLine("5. Registrar empréstimo");
                Console.WriteLine("6. Registrar devolução");
                Console.WriteLine();

                Console.Write("Qual decisão você deseja tomar? ");
                decisao = int.Parse(Console.ReadLine());

                //List<Livros> livro = new ArrayList<Livros>();
               

                if (decisao == 1)
                {
                    
                    Console.Write("Entre com o ISBN: ");
                    int isbn = int.Parse(Console.ReadLine());
                    Console.Write("Entre com o Titulo: ");
                    string titulo = Console.ReadLine();
                    Console.Write("Entre com o Autor: ");
                    string autor = Console.ReadLine();
                    Console.Write("Entre com o Editora: ");
                    string editora = Console.ReadLine();

                    livro.setIsbn(isbn);
                    livro.setTitulo(titulo);
                    livro.setAutor(autor);
                    livro.setEditora(editora);

                }

                if (decisao == 2)
                {

                    Console.WriteLine();
                    Console.WriteLine("===== INFO =====");
                    Console.WriteLine("ISBN: " + livro.getIsbn());
                    Console.WriteLine("Titulo: " + livro.getTitulo());
                    Console.WriteLine("Autor: " + livro.getAutor());
                    Console.WriteLine("Editora: " + livro.getEditora());
                }


                if (decisao == 0)
                {
                    Console.WriteLine("FIM DO PROGRAMA");
                    break;
                }


            } while (!(decisao < 0 || decisao > 6));

            Console.ReadLine();

        }
    }
}
