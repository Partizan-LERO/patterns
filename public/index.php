<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Design Patterns</title>
</head>
<body>
<ul>
    <li>Creational
        <ul>
            <li><a href="abstractfactory.php">Abstract Factory</a></li>
            <li><a href="builder.php">Builder</a></li>
            <li><a href="factorymethod.php">Factory Method</a></li>
            <li><a href="multiton.php">Multiton</a></li>
            <li><a href="pool.php">Pool</a></li>
            <li><a href="prototype.php">Prototype</a></li>
            <li><a href="simplefactory.php">Simple Factory</a></li>
            <li><a href="singleton.php">Singleton</a></li>
            <li><a href="staticfactory.php">Static Factory</a></li>
        </ul>
    </li>
    <li>Structural
        <ul>
            <li><a href="adapter.php">Adapter</a></li>
            <li><a href="bridge.php">Bridge</a></li>
            <li><a href="composite.php">Composite</a></li>
            <li><a href="datamapper.php">Data Mapper</a></li>
            <li><a href="decorator.php">Decorator</a></li>
            <li><a href="dependencyinjection.php">Dependency Injection</a></li>
            <li><a href="facade.php">Facade</a></li>
            <li><a href="querybuilder.php">Fluent Interface + Builder(Query Builder)</a></li>
            <li><strong>Flyweight</strong> is used for minimising memory usage by sharing data with other objects. Memory limit is not popular in PHP applications, so it doesn't make sense to implement this pattern here.</li>
            <li><a href="proxy.php">Proxy</a></li>
        </ul>
    </li>
    <li>
        Behavioral
        <ul>
            <li><a href="chainofresponsibility.php">Chain of responsibility</a></li>
            <li><a href="command.php">Command</a></li>
            <li><a href="iterator.php">Iterator</a></li>
            <li><strong>Memento. </strong>
                The idea of this pattern is to capture and store the object's internal state without exposing its internal structure.
                Memento – an object that contains a concrete unique snapshot of state of any object or resource.
                In most cases, you could make a copy of an object's state easier by simply using serialization.</li>
            <li><a href="nullobject.php">Null Object</a></li>
            <li><a href="observer.php">Observer</a></li>
            <li><strong>State pattern</strong> is really not popular in real PHP applications.
                It is similar to Strategy pattern but there is a difference: states knows about one another and are able to change it from the inside.
                Strategies doesn't know about one another and can't change the strategy.</li>
            <li><a href="strategy.php">Strategy</a></li>
            <li><a href="templatemethod.php">Template Method</a></li>
        </ul>
    </li>
</ul>
</body>
</html>