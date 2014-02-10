![Hoa](http://static.hoa-project.net/Image/Hoa_small.png)

Hoa is a **modular**, **extensible** and **structured** set of PHP libraries.
Moreover, Hoa aims at being a bridge between industrial and research worlds.

# Hoa\Zombie ![state](http://central.hoa-project.net/State/Zombie)

This library allows to transform a process to a zombie: not alive, nor dead!

This is possible only if the program is running behind
[PHP-FPM](http://php.net/install.fpm) (which manages processes for us).

## Quick usage

To create a zombie, all we have to do is to call the `Hoa\Zombie\Zombie::fork`
method. To kill a zombie, we have the choice between different weapons:

  * `Hoa\Zombie\Zombie::decapitate`, *ziip*;
  * `Hoa\Zombie\Zombie::bludgeon`, *tap tap*;
  * `Hoa\Zombie\Zombie::burn`, if you are cold;
  * `Hoa\Zombie\Zombie::explode`, *boom*;
  * `Hoa\Zombie\Zombie::cutOff`, sausage?

All these methods have been proven. Thus:

    // I'm alive!
    Hoa\Zombie\Zombie::fork();
    // I'm a zombie!
    Hoa\Zombie\Zombie::decapitate();
    // I'm dead…

But we have to run the script behind FastCGI, that is why we will use
`Hoa\Fastcgi` in the following example.

In the `Zombie.php` file, we write the following instructions:

    echo 'I guess I am sick…', "\n";
    Hoa\Zombie\Zombie::fork();

    // Do whatever you want here, e.g.:
    sleep(10);
    file_put_contents(
        __DIR__ . DS . 'A_Message',
        'Hello from after-life… or somewhere about!'
    );
    Hoa\Zombie\Zombie::decapitate();

Then, in the `Run.php` file, we write:

    $fastcgi = new Hoa\Fastcgi\Responder(
        new Hoa\Socket\Client('tcp://127.0.0.1:9000')
    );
    echo $fastcgi->send(array(
        'GATEWAY_INTERFACE' => 'FastCGI/1.0',
        'REQUEST_METHOD'    => 'GET',
        'SCRIPT_FILENAME'   => __DIR__ . DS . 'Zombie.php'
    ));

And finally, we can test:

    $ php-fpm -d listen=127.0.0.1:9000
    $ php Run.php
    I guess I am sick…

And 10 seconds after, we will see the `A_Message` file appear with the content:
*Hello from after-life… or somewhere about!*.

## Documentation

Different documentation can be found on the website:
[http://hoa-project.net/](http://hoa-project.net/).

## License

Hoa is under the New BSD License (BSD-3-Clause). Please, see
[`LICENSE`](http://hoa-project.net/LICENSE).
