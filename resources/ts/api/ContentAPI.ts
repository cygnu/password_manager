import axios from 'axios'
import { Content } from '../types/Content'

const getContents = async (currentPage: number) => {
  const { data } = await axios.get(`api/contents?${currentPage}`)
  return data
}

const createContent = async ({
  content_name,
  content_image,
  content_url,
  is_one_account,
  is_paid_subscription
}: {
  content_name: string
  content_image: string | undefined
  content_url: string
  is_one_account: boolean
  is_paid_subscription: boolean
}) => {
  const { data } = await axios.post<Content>('api/contents', {
    content_name: content_name,
    content_image: content_image,
    content_url: content_url,
    is_one_account: is_one_account,
    is_paid_subscription: is_paid_subscription
  })
  return data
}

const getContent = async (content_id: number) => {
  const { data } = await axios.get(`api/content/${content_id}`)
  return data
}

const updateContent = async ({ content_id, content }: { content_id: number; content: Content }) => {
  const { data } = await axios.put<Content>(`api/content/${content_id}`, content)
  return data
}

const deleteContent = async (content_id: number) => {
  const { data } = await axios.delete<Content>(`api/content/${content_id}`)
  return data
}

export { getContents, createContent, getContent, updateContent, deleteContent }
