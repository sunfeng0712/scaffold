# 错误日志聚合平台

程序运行的日志是一个必不可少的东西，传统程序日志文件过于分散、内容过于繁杂，很可能在程序刚开始运行起来的时候，我们会检查一下情况，看看日志是否正常。但是更多的时候我们根本不会想去看那些冗长的日志。过了一段时间，突然有人告诉我们问题出现了，便又怀着沉重的心情慌张地检查日志开始排查错误。

Sentry将日志汇集、聚合、主动报警还拥有漂亮的界面，真正提高了日志利用的效率。

我们可以使用[Docker搭建私有Sentry服务](https://juejin.im/post/5a992115f265da239f06d0d7)，使用方面[mito](mito.hu)开源的[yii2-sentry](https://github.com/hellowearemito/yii2-sentry)组件提供了YiiLogTarget方案。

## Usage
TODO