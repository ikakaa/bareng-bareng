#include<stdio.h>
#include<stdlib.h>
#include<ctype.h>
#include<string.h>
#define SIZE 1007
struct Library{
	char name[123];
	int age;
	Library *prev,*next;
	int hash_key;
};
Library *head[SIZE];
Library *tail[SIZE];
int hash_function(char name[]){
	int key=0;
	int len=strlen(name);
	for(int i=0;i<len;i++){
		key++;
	}
	return key%SIZE;
}
Library *create_library(char name[],int age){
	Library *new_library=(Library*)malloc(sizeof(Library));
	strcpy(new_library->name,name);
	new_library->age=age;
	new_library->hash_key=hash_function(new_library->name);
	return new_library;
}



void insert(Library *new_library){
	int idx=hash_function(new_library->name);
	if(head[idx]==NULL){
	head[idx]=tail[idx]=new_library;
	}else
	{
		
		if(strcmp(tail[idx]->name,new_library->name)<0){
			new_library->prev=tail[idx];
			tail[idx]->next=new_library;
			tail[idx]=new_library;
		}
		}	
	
}
	void show(){
		if(head==NULL){
		printf("No data \n");
		return;	
			
		}
		else{
			for(int i=0;i<SIZE;i++){
				if(head[i]!=NULL){
					Library *temp=head[i];
					while(temp!=tail[i]){
						printf("Name : %s\n",temp->name);
						temp=temp->next;
					}
					printf("Name : %s\n",tail[i]->name);
				}
			}
		}
		
		}
	
int main(){
	insert(create_library("ADRIAN",1));
	insert(create_library("ADRIAN2",1));
	show();
	
	return 0;
}



