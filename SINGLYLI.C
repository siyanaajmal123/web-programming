#include<stdio.h>
#include<stdlib.h>
struct node
{
int info;
struct node *ptr;
}*top,*temp,*top1;
int topelement();
void push (int data);
void pop();
void empty();
void display();
void stackcount();
int count=0;
void destroy();
void create();
void main()
{
int no,ch,e;
clrscr();
printf("\n1.push\n2.pop\n3.top\n4.empty\n5.exit\n6.display\n7.stackcount\n8.destroy\n");
create();
while(1)
{
printf("enter the choice:\n");
scanf("%d",&ch);
switch(ch)
{
case 1:printf("enter the data:\n");
scanf("%d",&no);
push(no);
break;
case 2:pop();
break;
case 3:if(top==NULL)
printf("the stack is empty \n");
else
{
e=topelement();
printf("the top element in the stack is:%d \n",e);
}
break;
case 4:empty();
break;
case 5:exit(0);

case 6:display();
break;
case 7:stackcount();
break;
case 8:destroy();
break;
default:printf("the choice is invalid \n");
break;
}
}
}
void create()
{
top=NULL;
}
int topelement()
{
return(top->info);
}
void push(int data)
{
if(top==NULL)
{
temp=(struct node*)malloc(sizeof(struct node));
top->ptr=NULL;
top->info=data;
}
else
{
temp=(struct node*)malloc(sizeof(struct node));
//temp->info=data;
temp->ptr=top;
temp->info=data;
top=temp;
}
count++;
}
void pop()
{
top1=top;
if(top1==NULL)
{
printf("ERROR:Trying to pop from empty stack\n");
return;
}
else
{
top1=top1->ptr;
printf("popped value=%d\n",top->info);
free(top);
top=top1;
count--;
}
}
void stackcount()
{
printf( "the number of elements in stack=%d\n",count);
}
void display()
{
//struct node *top1;
top1=top;
if(top1==NULL)
{
printf("stack is empty!!\n");
return;
}
printf("the stack elements are:\n");
while(top1!=NULL)
{
printf("%d\n",top1->info);
top1=top1->ptr;
}
}

void empty()
{
if(top==NULL)
printf("stack is empty \n");
else
printf("stack is  not empty and contains %d elemnts\n",count);
}
void destroy()
{
top1=top;
while(top1!=NULL)
{
top1=top->ptr;
free(top);
top=top1;
top1=top1->ptr;
}
free(top1);
top=NULL;
printf("all stack elements destroyed\n");
count=0;
}