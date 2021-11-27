USE BLOG_PROJECT;
UPDATE ENTRADAS SET DESCRIPTION='Following are the top 15 Java best Practices that you should start following to upgrade your coding standards  
<ol>
<h3><li>Use Proper Naming Conventions</li></h3>
First thing first, before start writing code, set a proper naming convention for your Java project. Pre-decide names for every class, interfaces, methods and variables etc. If other developers are also working with you on the same project, they should also follow it to maintain the uniformity. A meaningful naming convention is extremely important as everything, from classes to interfaces are identified from their names in the code.

Do not assign random names just to satisfy the compiler, use meaningful and self-explanatory names so that it is readable and can be later understood by yourself, your teammates, quality assurance engineers and by staff who will be handling maintenance of the project.

<h3><li>Class Members must be accessed privately</li></h3>
It is considered a java best practice to keep the accessibility of class fields as inaccessible as possible. It is done to protect the fields. To achieve that, private access modifier is the ideal choice. This practice is recommended to maintain the encapsulation, one of the fundamental concepts of OOP. Although it is an extremely basic concept of object-oriented programming, many new developers are aware of it but still do not properly assign access modifiers to the classes and prefer to keep it public for their ease.

Consider this class where fields are made public:<br/>
<code>
	public class Teacher {
	    public String name;
	    public String subject;
	} 
</code>
The encapsulation is compromised here as anyone can change these values like this,<br/>
<code>
	Teacher T01 = new Teacher();
	Teacher.name = "Sam";
	Teacher.subject = “Science”;
</code>
Using private access modifier with class members keeps the fields hidden preventing a user to change the data except for setter methods.

Here is another example using private access modifier: <br/>
<code>
	public class Teacher {
	    private String name;
	    private String subject;
	 
	    public void setName(String name) {
	        this.name = name;
	    }
	    public void setSubject(String subject)
	        this.subject = subject;
	    }
	}
</code>
<h3><li>Use Underscores in lengthy Numeric Literals</li></h3>
This feature was introduced in Java 7 that helps in writing lengthy numeric literals in a much more readable way. So instead of writing in the old and common way like this,<br/>
<code>
	int num = 58356823;
</code>
You can assign a lengthy number like this
<code>
	int num = 58_356_823;
</code>
Adapting one of such java best practice makes your code readable, well-structured and unique.

<h3><li>Never leave a Catch Blocks empty</li></h3>
It is a java best practice preferred by elite developers to write a proper and meaningful message in the catch block while exception handling. New developers often leave the catch block empty as initially they are the only ones working on a code but when the exception is caught by the empty catch block, when the program gets an exception, it does not show anything, making debugging harder and time-consuming.  

<h3><li>Use StringBuilder or StringBuffer for String Concatenation </li></h3>
Using the “+” operator to join Strings together is a common practice in many programming languages including Java.

This is a common practice and not a wrong, however, with you need to concatenating numerous strings, the “+” operator proves to be inefficient as the Java compiler creates multiple intermediate String objects before creating the final concatenated string.

The java best practice, in that case, would be using “StringBuilder” or “StringBuffer”. These built-in functions modify a String without creating intermediate String objects saving processing time and unnecessary memory usage.

For instance,<br/>
<code>
	String sql = "Insert Into Users (name, age)";
	sql += " values (\'" + user.getName();
	sql += "\', \'" + user.getage();
	sql += "\')";
</code>
 The above-mentioned code could be written using StringBuilder like this,<br/>
<code>
	StringBuilder sqlSb = new StringBuilder("Insert Into Users (name, age)");
	sqlSb.append(" values (\'").append(user.getName());
	sqlSb.append("\', \'").append(user.getage());
	sqlSb.append("\')");
	String sqlSb = sqlSb.toString();
</code>
6. Avoid Redundant Initializations</li></h3>
Although it is very common practice, it is not encouraged to initialize member variables with the values: like 0, false and null. These values are already the default initialization values of member variables in Java. Therefore, a java best practice is to be aware of the default initialization values of member variables and avoid initializing the variables explicitly.

<h3><li>Using enhanced for loops instead of for loops with counter</li></h3>
“For” loop is used with a counter variable but a unique java best practice suggested by every top java developer is using the enhanced for loop instead of the old simple For loop. Generally, it won’t make any difference to use either of them but in some cases, the counter variable used could be very error-prone. The counter variable can incidentally get altered, it may get used later in the code or you may start the index from 1 instead of 0 which will result in disturbing the code at multiple points. To eliminate this, enhanced for loop is a good option.

Consider the following code snippet:<br/>
<code>
	String[] names = {"Sam", "Mike", "John"}; 
	for (int i = 0; i < names.length; i++) {
	    method1(names[i]);
	}
</code>
Here variable “I” is used as a counter for a loop as well as the index for the array names. It can get problematic later in the code so We can avoid the potential problems by using an enhanced for loop like shown below:<br/>
<code>
	For (String Name1 : names) {
	    Method1(Name1);
	}
</code>
<h3><li>Proper handling of Null Pointer Exceptions</li></h3>
Null Pointer Exceptions are very common in Java. This exception occurs in a result of an attempt to call a method on a Null Object Reference. For instance, see the line of code mentioned below, <br/>
<code>
	int noOfEmployees = office.listEmployees().count;
</code>
This line is free of any error, but if either the object “office” or method” listEmployees()” is Null then the code will throw a null pointer exception. Null pointer exceptions are inevitable but for its better handling, there are some java coding best practices to follow. First, it is important to check Nulls prior execution so that they can be eliminated and alter your code to handle it well.

A corrected version of code is show below,<br/>
<code>
	private int getListOfEmployees(File[] files) {
	    if (files == null) {
	        throw new NullPointerException("File list cannot be null");	
		}
	}
</code>
<h3><li>Float or Double: the right choice?</li></h3>
Often inexperience developers cannot differentiate between Double and Float, they know the basics but when it comes to using one, they usually go with the same choice in every scenario.

It is a java best practice to use float and Double as per your requirement. As best practices not only improve readability and understanding of code, they also improve the performance of your code. Most processors take almost same time in processing the operations on Float and double but double offers way more precision then Float that is why it is best practice to use double when precision is important otherwise you can go with float as it requires half space than double.

<h3><li>Use of single quotes and double quotes</li></h3>
We all know double quotes are used to represent strings and single quotes are for characters but in some unique cases, it can go wrong. When it is required to concatenate characters to make a string, it is java best practice to use double quotes for the characters that are about to be concatenated. The reason behind it is that if double quotes are used, the characters will be treated as a simple string and there will be no issues but if you use single quotes the integer values of the characters will be considered due to a process called widening primitive conversion. <br/>
<code>
	public class classA {
	    public static void main(String args[]) {
	        System.out.print("A" + "B");
	        System.out.print(\'C\' + \'D\');
	    }
	}
</code>
Here the output should be ABCD on the screen but you will be seeing AB135 because AB is fine but because C and D are in single quotes, their ASCII values are used and added together due to “+” operator resulting in AB135 on screen.

<h3><li>Avoiding Memory leaks</li></h3>
In Java, the developers do not have much control over memory management as Java manages the memory automatically. Still, there are among some java best practices used by top developers to prevent memory leaks as it can cause some significant performance degradation. Always releasing database connections after your querying is done, Use of Finally block as often possible and Releasing instances stored in Static Tables are some java coding best practices you must adapt to prevent memory leakage.

<h3><li>Return Empty Collections instead of returning Null elements</li></h3>
Null elements handling needs some extra work that is why If a method is returning a collection which does not have any value, a best java practice is to return an empty collection instead of Null elements. It skips the null element saving the efforts needed for testing on Null Elements.

<h3><li>Efficient use of Strings</li></h3>
Strings handling is very easy in Java but it must be used efficiently to prevent access memory usage. For instance, if two Strings are concatenated in a loop, a new String object will be created at every iteration. If the number of loops is significant, it can cause a lot of memory wastage and will increase the performance time as well. Another case would be of instantiating a String Object, a java best practice is to avoid using constructors for instantiation and instantiation should be done directly. It is way faster as compared to using a constructor.

<h3><li>Unnecessary Objects Creation</li></h3>
Object Creation is one of the most memory consuming operation that is why the best java practice is to avoid making any unnecessary objects and they should only be created when required.

<h3><li>Proper Commenting</li></h3>
As your code will be read by various people with varying knowledge of Java, Proper comments should be used to give overviews of your code and provide additional information that cannot be perceived from the code itself. Comments are supposed to describe the working of your code to be read by Quality assurance engineer, tester or maintenance staff who might not have enough knowledge about Java.
</ol>' WHERE ID=1 ;
SELECT * FROM ENTRADAS;