# Pyrocms HTML Compressor
A HTML Compressor for PyroCMS 3

## How to Use
Wrap your HTML in the dedicated Twig tags. You can use these tags anywhere in your HTML/Twig view.
```
{% htmlcompress %}

<html>
...
</html>

{% endhtmlcompress %}
```

You can also wrap your HTML in the dedicated Twig functions, but this isn't as cool.
```
{{ htmlcompress() }}

<html>
...
</html>

{{ endhtmlcompress() }}
```
