# themiss
视频购物网站
测试在github上创建仓库，并且将自己本地的代码提交到github上的方法
关键步骤是：创建ssh密钥 
如下：
$ ssh-keygen -t rsa -C "156850@qq.com"
$ chmod 0700 ~/.ssh
$ chmod 0600 ~/.ssh/id_rsa
然后将公钥复制到github上。
再就是测试 所做的操作是否正确：
如下测试及结果：
$ ssh -T git@github.com
Hi kaixin99/themiss! You've successfully authenticated, but GitHub does not provide shell access.

接着 就可以上传自己的代码到github上了
如下：
git push -u origin master

Branch master set up to track remote branch master from origin.
设置主分支远程追踪原始主分支
