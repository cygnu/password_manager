import axios from 'axios'

const getContents = async () => {
  const { data } = await axios.get('api/contents')
  return data
}

const createContent = async (
  content_name: string,
  content_image: string,
  content_url: string,
  is_one_account: boolean,
  is_paid_subscription: boolean
) => {
  const { data } = await axios.post('api/contents', {
    content_name: content_name,
    content_image: content_image,
    content_url: content_url,
    is_one_account: is_one_account,
    is_paid_subscription: is_paid_subscription
  })
  return data
}

export { getContents, createContent }
