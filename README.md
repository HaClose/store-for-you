# store-for-you
仮説検証LP

# はじめかた

## git clone
ローカルPCにクローンします。
```
git clone https://github.com/HaClose/store-for-you.git
```

## cd
クローンしたフォルダに移動
```
cd store-for-you/
```

## git branch
ローカルブランチ（作業用ブランチ）を作成
```
git branch issue
```
※issueは任意なので、作業名に適したbranch名でOKです

ローカルブランチができていることを確認
```
git branch
```

## git checkout
ブランチの切り替えを行う
```
git checkout issue
```

## git add
ローカルのステージングエリアに追加
```
git add .
```

## git commit
ローカルブランチにコミット
```
git commit -m 'for description'
```
※シングルクォートの中は任意です

## git push
ローカルブランチの内容をリモートブランチに反映する
```
git push origin issue:issue
```
※issueは任意なので、作成したbranch名でOKです

## pull request
https://github.com/HaClose/store-for-you/pulls
にアクセス

「New pull request」ボタン押下

base:master、compare：issueを選択
※issueは任意なので、作成したbranch名でOKです

タイトルなど適宜入力し、「Create pull request」ボタン押下
作成されたURLを連携
