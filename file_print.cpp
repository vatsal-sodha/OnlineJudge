#include <fstream>
#include <iostream>
#include <string>
#include <sys/types.h> 
#include <sys/time.h>
#include <signal.h>
#include <stdlib.h>
#include <sys/resource.h>
#include <unistd.h>
#include <sys/wait.h>
#include <stdio.h>
#include <cstring>
#include <err.h>
using namespace std;


int main ( int argc, char *argv[] )
{
  pid_t  pid,waitss;
  clock_t t1, t2;
  
  struct rlimit rl;

 

  pid = fork();

//  s=strcat(s,name);

  if (pid != 0) 
    { //PARENT
          	
      siginfo_t info;
      int status;
      waitpid(pid, &status, 0); // Wait for the child process to return.
    //  cout << "Process returned " << WEXITSTATUS(status) << ".\n";


    }
  else 
      {//CHILD
      getrlimit (RLIMIT_CPU, &rl);

      rl.rlim_cur = 1;
      rl.rlim_max=1;
      setrlimit (RLIMIT_CPU, &rl);

      char name[80];
      strcpy(name,"./");
      strcat(name,argv[1]);

      cout<<

      if(!strcmp(argv[2],"1"))
      {
        strcat(name," < /Users/adeshkala/Security/Submissions/input/input1.txt > output");
        strcat(name,argv[1]);
        strcat(name,".txt");
      }
      else if(!strcmp(argv[2],"2")){
          
        strcat(name," < /Users/adeshkala/Security/Submissions/input/input2.txt > output");
        strcat(name,argv[1]);
        strcat(name,".txt");
        }
        else if(!strcmp(argv[2],"3")){
          
        strcat(name," < /Users/adeshkala/Security/Submissions/input/input3.txt > output");
        strcat(name,argv[1]);
        strcat(name,".txt");
        }

        else if(!strcmp(argv[2],"4")){
          
        strcat(name," < /Users/adeshkala/Security/Submissions/input/input4.txt > output");
        strcat(name,argv[1]);
        strcat(name,".txt");
        }
        else if(!strcmp(argv[2],"5")){
          
        strcat(name," < /Users/adeshkala/Security/Submissions/input/input5.txt > output");
        strcat(name,argv[1]);
        strcat(name,".txt");
        }

        cout<<name;
        system(name);
      //cout<<name;



     }
 
  return 0;
}