//Tugas persiapan quiz Data Structure
//2201750654 - Adrian Putra
#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<ctype.h>
#define SIZE 1007

struct Library{
char booktitle[123];
char bookid[123];
char isbn[123];
char bookauthor[123];
int pagenumber;
int hash_key;
Library *prev,*next;	
};
Library *head[SIZE];
Library *tail[SIZE];


int hash_function(char bookid[]){
	int len=strlen(bookid);
	int key=0;
	for(int i=0;i<len;i++){
		key++;
	}
	return key%SIZE;
}
Library *create_library(char booktitle[],char bookauthor[],char isbn[],char bookid[],int pagenumber){
	Library *new_library=(Library*)malloc(sizeof(Library));
	strcpy(new_library->bookid,bookid);
	strcpy(new_library->bookauthor,bookauthor);
	strcpy(new_library->booktitle,booktitle);
	strcpy(new_library->isbn,isbn);
	new_library->pagenumber=pagenumber;
	new_library->hash_key=hash_function(new_library->bookid);
	return new_library;
}
void insert_library(Library *new_library){
	int idx=hash_function(new_library->bookid);
	if(head[idx]==NULL){
		head[idx]=tail[idx]=new_library;
	}
	else {
		if(strcmp(tail[idx]->bookid,new_library->bookid)<0){
			new_library->prev=tail[idx];
			tail[idx]->next=new_library;
			tail[idx]=new_library;
		}
	}
	}
	

void remove_library(char bookid[]){
	int checkremove=0;
	int idx=hash_function(bookid);
	if(head[idx]==NULL){
		return;
	}
	else if(head[idx]==tail[idx]){
		free(head[idx]);
		head[idx]=tail[idx]=NULL;
		checkremove++;
	}
	else if(strcmp(head[idx]->bookid,bookid)==0){
		head[idx]=head[idx]->next;
		free(head[idx]->prev);
		head[idx]->prev==NULL;
		checkremove++;
		
	}
	else if(strcmp(tail[idx]->bookid,bookid)==0){
		tail[idx]=tail[idx]->prev;
		free(tail[idx]->next);
		tail[idx]->next=NULL;
		checkremove++;
	}
	//pop mid
	else{
		Library *temp=head[idx];
		while(temp){
			if(strcmp(temp->bookid,bookid)==0){
				temp->prev->next=temp->next;
				temp->next->prev=temp->prev;
				free(temp);
				temp=NULL;
				checkremove++;
			}
			temp=temp->next;
		}
	}
	if(checkremove==0){
		printf("Data not found\n");
	}else{
		printf("Data deleted!\n");
	}
	
}


void show(){
	int checkcount=0;
	if(head==NULL){
		printf("No Data!\n");return;
	}
		
	for(int i=0;i<SIZE;i++){
		if(head[i]!=NULL){
				printf("BOOK ID              ||   BOOK TITLE     ||     BOOK AUTHOR    ||   ISBN     ||  PAGE NUMBER\n");
			Library *temp=head[i];
			while(temp!=tail[i]){
				printf("%s || %s    ||   %s   ||    %s     || %d   \n",temp->bookid,temp->booktitle,temp->bookauthor,temp->isbn,temp->pagenumber);
		checkcount++;
			temp=temp->next;
			}
					printf("%s || %s    ||   %s   ||    %s     || %d   \n",tail[i]->bookid,tail[i]->booktitle,tail[i]->bookauthor,tail[i]->isbn,
					tail[i]->pagenumber); checkcount++;
		}
	}
	if(checkcount==0){
		printf("No Data!\n");
	}
}
int main(){
	int choose=0;
	int count=0;

	do{
printf("BlueJack Library\n");
printf("=================\n");
printf("1.View Book\n");		
printf("2.Insert Book\n");		
printf("3.Remove Book\n");
printf("4.Exit\n");	
printf("Choose: ");
scanf("%d",&choose);getchar();
if(choose==1){

	show();
}
if(choose==2){
	bool flag=true;
	char booktitle[123]={""};
	char bookauthor[123]={""};
	char bookid[123]={""};
	char isbn[123]={""};
	int pagenumber=0;
	do{
	flag=false;
	printf("Input Book Title:[5-50][Unique]: ");
	scanf("%[^\n]",booktitle);getchar();
	if(strlen(booktitle)>5 && strlen(booktitle)<50){
		flag=false;
	}else{
		flag=true;
	}
	}while(flag!=false);
	
	do{
		flag=false;
		printf("Input Author Name [3-25][Mr.  || Mrs. ](Case Sensitive): ");
		scanf("%[^\n]",bookauthor);getchar();
		if((strlen(bookauthor)>3 && bookauthor[0]=='M' && bookauthor[1]=='r'  && bookauthor[2]=='s' 
		&& bookauthor[3]=='.' && bookauthor[4]==' ' ) || (strlen(bookauthor)>3 && bookauthor[0]=='M'
		 && bookauthor[1]=='r' 
		&& bookauthor[2]=='.' && bookauthor[3]==' ')
		){
			flag=false;
		}else{
			flag=true;
		}
	}while(flag!=false);
	
	do{
		flag=false;
		printf("Input ISBN[10-13][numeric]");
		scanf("%s",isbn);getchar();
		if(strlen(isbn)>=10 && strlen(isbn)<=13){
			flag=false;
		}else{
			flag=true;
		}
	}while(flag!=false);
	do{
		flag=false;
		printf("Input Page Number[>=16]");
		scanf("%d",&pagenumber);getchar();
		if(pagenumber>=16){
			flag=false;
		}else{
			flag=true;
		}
		
	}while(flag!=false);
	//format bookid
	count++;
	bookid[0]='B';
	bookid[1]='0';
	bookid[2]='0';
	bookid[3]='0';

	char hitungcount[123]={""};

	itoa(count,hitungcount,10);
	bookid[4]='0';
	bookid[5]=hitungcount[0];



strncat(bookid,"-",1);
strncat(bookid,isbn,strlen(isbn));
char ambilke1[123]={""};
if(strlen(bookauthor)>3 && bookauthor[0]=='M' && bookauthor[1]=='r'  && bookauthor[2]=='s' 
		&& bookauthor[3]=='.' && bookauthor[4]==' ' ){
		
ambilke1[0]=toupper(bookauthor[5]);
}else{
	ambilke1[0]=toupper(bookauthor[4]);
}
strncat(bookid,"-",1);
strncat(bookid,ambilke1,1);
char ambilke2[123]={""};
ambilke2[0]=toupper(booktitle[0]);
strncat(bookid,ambilke2,1);
insert_library(create_library(booktitle,bookauthor,isbn,bookid,pagenumber));
printf("Data Inserted!\n");getchar();
}


if(choose==3){
	bool flag2=false;
	char datatoremove[123];
	char inputan[123];
	printf("Insert book id to remove: ");
	scanf("%s",datatoremove);
	do{
	flag2=false;
	printf("Are you sure ? [Y/N]: ");
	scanf("%s",inputan);
	if(inputan[0]=='Y' || inputan[0]=='N'){
		flag2=false;
	}	else{
		flag2=true;
	}
	}while(flag2!=false);
	if(inputan[0]=='Y'){
		remove_library(datatoremove);
		getchar();
	}
	if(inputan[0]=='N'){
		printf("Canceled!\n");getchar();
	}
}
	
	}while(choose!=4);
//	return 0;
}
