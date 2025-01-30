"use client"

import { useState } from "react"
import { MessageCircle, X } from "lucide-react"

const LiveChat = () => {
  const [isOpen, setIsOpen] = useState(false)

  const toggleChat = () => setIsOpen(!isOpen)

  return (
    <div className="fixed bottom-4 right-4 z-50">
      {isOpen ? (
        <div className="bg-white rounded-lg shadow-lg w-80 h-96 flex flex-col">
          <div className="bg-blue-600 text-white p-4 flex justify-between items-center">
            <h3 className="font-semibold">Live Chat</h3>
            <button onClick={toggleChat} aria-label="Close chat">
              <X className="w-6 h-6" />
            </button>
          </div>
          <div className="flex-grow p-4 overflow-y-auto">
            {/* Chat messages would go here */}
            <p className="text-gray-600">How can we help you today?</p>
          </div>
          <div className="p-4 border-t">
            <input type="text" placeholder="Type your message..." className="w-full p-2 border rounded" />
          </div>
        </div>
      ) : (
        <button
          onClick={toggleChat}
          className="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-colors duration-300"
          aria-label="Open live chat"
        >
          <MessageCircle className="w-6 h-6" />
        </button>
      )}
    </div>
  )
}

export default LiveChat

